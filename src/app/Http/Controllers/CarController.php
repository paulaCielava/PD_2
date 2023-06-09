<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Razotajs;
use App\Http\Requests\carRequest;

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
        public function put(carRequest $request)
        {
            $car = new Car();
            $this->saveCarData($car, $request);
            return redirect('/cars');
        }

        // Update cars
        public function update(Car $car) {

            $razotajs = Razotajs::orderBy('name', 'asc')->get();

            return view(
                'car.form',
                [
                    'title' => 'Rediģēt modeli',
                    'car' => $car,
                    'razotajs' => $razotajs,
                ]
            );
        }

        // save new car
        public function patch(Car $car, carRequest $request)
        {
            $this->saveCarData($car, $request);
            return redirect('/cars/update');
        }

        public function delete(Car $car){
            $car->delete();
            return redirect('/cars');
        }

        private function saveCarData(Car $car, Request $request) {
            $validatedData = $request->validate([
                'name' => 'required|min:3|max:256',
                'razotajs_id' => 'required',
                'description' => 'nullable',
                'price' => 'nullable|numeric',
                'year' => 'numeric',
                'image' => 'nullable|image',
                'display' => 'nullable'
            ]);
            /*
            $car->name = $validatedData['name'];
            $car->author_id = $validatedData['author_id'];
            $car->description = $validatedData['description'];
            $car->price = $validatedData['price'];
            $car->year = $validatedData['year'];
            $car->display = (bool) ($validatedData['display'] ?? false);
            */

            $car->fill($validatedData);
            $car->display = (bool) ($validatedData['display'] ?? false);

            if ($request->hasFile('image')) {
                $uploadedFile = $request->file('image');
                $extension = $uploadedFile->clientExtension();
                $name = uniqid();
                $car->image = $uploadedFile->storePubliclyAs(
                    '/',
                    $name . '.' . $extension,
                    'uploads'
                );
            }
            $car->save();

            }






}
