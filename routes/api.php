<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecipeApiController;

Route::apiResource('recipes', RecipeApiController::class);
