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

    // display new car form
    public function create() {

        $razotajs = Razotajs::orderBy('name', 'asc')->get();

        return view(
            'car.form',
            [
                'title' => 'Pievienot jaunu modeli',
                'car' => new Car(),
                'razotajs' => $razotajs,
            ]
        );
    }

        // save new car
        public function put(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|min:3|max:256',
                'razotajs_id' => 'required',
                'description' => 'nullable',
                'price' => 'nullable|numeric',
                'year' => 'numeric',
                'image' => 'nullable|image',
                'display' => 'nullable'
            ]);
    
            $car = new Car();
            $car->name = $validatedData['name'];
            $car->author_id = $validatedData['razotajs_id'];
            $car->description = $validatedData['description'];
            $car->price = $validatedData['price'];
            $car->year = $validatedData['year'];
            $car->display = (bool) ($validatedData['display'] ?? false);
            $car->save();
    
            return redirect('/cars');
        }

}
