@extends('layouts.app')

@section('content')
    <h2>All Recipes</h2><br>

    <div class="recipes-grid">
        @foreach ($recipes as $recipe)
            <div class="card">
                @if($recipe->photo)
                    <img src="{{ asset($recipe->photo) }}" alt="{{ $recipe->name }}">
                @endif
                <h3 style="text-align: center">{{ $recipe->name }}</h3><br>
                <p><strong>Ingredients:</strong> {{ Str::limit($recipe->ingredients, 80) }}</p>
                <p><strong>Steps:</strong> {{ Str::limit($recipe->steps, 80) }}</p>

                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
