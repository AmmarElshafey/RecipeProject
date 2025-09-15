<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'ingredients' => 'required|string',
            'steps'       => 'required|string',
            'photo'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $newPhotoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('photos/recipes'), $newPhotoName);
            $validated['photo'] = 'photos/recipes/' . $newPhotoName;
        }

        Recipe::create($validated);
        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'ingredients' => 'required|string',
            'steps'       => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($recipe->photo && File::exists(public_path($recipe->photo))) {
                File::delete(public_path($recipe->photo));
            }

            $photo = $request->file('photo');
            $newPhotoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('photos/recipes'), $newPhotoName);
            $validated['photo'] = 'photos/recipes/' . $newPhotoName;
        }

        $recipe->update($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        if ($recipe->photo && File::exists(public_path($recipe->photo))) {
            File::delete(public_path($recipe->photo));
        }

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}