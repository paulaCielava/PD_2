<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class DataController extends Controller
{
    // argirež 3 nejauši izveletas mašīnas
    public function getTopCars() {
        return Car::where('display', true)
            ->inRandomOrder()
            ->take(3)
            ->get();
    }

    // atgriež izvēlētās mašīnas datus
    public function getCar(Car $car){
        return Car::where([
            'id' => $car->id,
            'display' => true,
        ])
        ->firstOrFail();
    }

    // atgriež līdzīgus ierakstus
    public function getRelatedCars(Car $car) {
        return Car::where('display', true)
            ->where('id', '<>', $car->id)
            // ->where('razotajs_id', $car->razotajs_id)
            ->inRandomOrder()
            ->take(3)
            ->get();
    }
}
