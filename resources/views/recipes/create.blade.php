@extends('layouts.app')

@section('content')
<div class="container">
    <div class="recipe-show">
        <h2 style="text-align:center; margin-bottom:1.5rem; color:#2d3748;">➕ Add New Recipe</h2>

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name"> Recipe Name</label>
            <input type="text" name="name" id="name" placeholder="Enter recipe name..." required>

            <label for="ingredients"> Ingredients</label>
            <textarea name="ingredients" id="ingredients" rows="4" placeholder="List the ingredients..." required></textarea>

            <label for="steps"> Steps</label>
            <textarea name="steps" id="steps" rows="4" placeholder="Describe the preparation steps..." required></textarea>

            <label for="photo">📷 Photo</label>
            <input type="file" name="photo" id="photo">

            <div class="recipe-actions">
                <button type="submit" class="btn btn-primary"> Save Recipe</button>
                <a href="{{ route('recipes.index') }}" class="btn btn-danger">↩️ Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
