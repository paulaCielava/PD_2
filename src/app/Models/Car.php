<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'razotajs_id', 'description', 'price', 'year'];


    public function razotajs(){
        return $this->belongsTo(Razotajs::class);
    }
}
