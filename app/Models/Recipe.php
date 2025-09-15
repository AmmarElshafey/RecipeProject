<?php

namespace App\Models;

use App\Models\Favourite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'ingredients', 'steps','photo'];
     
     public function favourites() {
    return $this->hasMany(Favourite::class);
}
}

