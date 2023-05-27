<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Razotajs;

class CarController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // display all cars
    public function list(){
        $items = Car::orderBy('name', 'asc')->get();

        return view(
            'car.list',
            [
                'title' => 'Modeļi',
                'items' => $items,
            ]
        );
    }




}
