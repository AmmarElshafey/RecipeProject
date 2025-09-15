<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeApiController extends Controller
{
    
    public function index()
    {
        $recipes = Recipe::all();
        return response()->json($recipes); 
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return response()->json($recipe);
    }

  
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $newPhotoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('photos/recipes'), $newPhotoName);
            $data['photo'] = 'photos/recipes/' . $newPhotoName;
        }

        $recipe = Recipe::create($data);

        return response()->json([
            'message' => 'Recipe created successfully',
            'recipe' => $recipe
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->update($request->all());

        return response()->json([
            'message' => 'Recipe updated successfully',
            'recipe' => $recipe
        ]);
    }
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return response()->json(['message' => 'Recipe deleted successfully']);
    }
}
