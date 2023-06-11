<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'razotajs_id', 'categorie_id', 'description', 'price', 'year'];


    public function razotajs(){
        return $this->belongsTo(Razotajs::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'razotajs' => $this->razotajs->name,
            'categorie' => ($this->categorie ? $this->categorie->name : ""),
            'price' => number_format($this->price, 2),
            'year' => $this->year,
            'image' => asset('images/' . $this->image,),
        ];
    }




}
