@extends('layouts.app')

@section('content')
<div class="container">
    <div class="recipe-show">
        <h2 style="text-align:center; margin-bottom:1.5rem; color:#2d3748;">✏️ Edit Recipe</h2>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name"> Recipe Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $recipe->name) }}" required>

            <label for="ingredients"> Ingredients</label>
            <textarea name="ingredients" id="ingredients" rows="4" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>

            <label for="steps"> Steps</label>
            <textarea name="steps" id="steps" rows="4" required>{{ old('steps', $recipe->steps) }}</textarea>

            <label for="photo">📷 Update Photo</label>
            <input type="file" name="photo" id="photo">

            @if($recipe->photo)
                <div style="margin-top:1rem; text-align:center;">
                    <p style="font-weight:bold; margin-bottom:0.5rem;">Current Photo:</p>
                    <img src="{{ asset($recipe->photo) }}" alt="Recipe Photo" style="max-width:200px; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                </div>
            @endif

            <div class="recipe-actions">
                <button type="submit" class="btn btn-primary"> Update Recipe</button>
                <a href="{{ route('recipes.index') }}" class="btn btn-danger">↩️ Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
