@extends('layouts.app')

@section('content')
<div class="recipe-show">
    <img src="{{ asset($recipe->photo) }}" alt="{{ $recipe->name }}">
    <h2>{{ $recipe->name }}</h2>

    <h3>Ingredients</h3>
    <p>{{ $recipe->ingredients }}</p>

    <h3>Steps</h3>
    <p>{{ $recipe->steps }}</p>

    <div class="recipe-actions">
        <a href="{{ route('recipes.index') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
