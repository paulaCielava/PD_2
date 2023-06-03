<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'categorie_id', 'description', 'price', 'year'];


    public function car(){
        return $this->belongsTo(Car::class);
    }
}
