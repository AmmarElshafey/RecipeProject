<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favourite extends Model
{
    use HasFactory;
     protected $fillable = ['device_id','recipe_id'];

    public function recipe()
     {
         return $this->belongsTo(Recipe::class); 
        }
}
