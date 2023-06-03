<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Razotajs;
use App\Models\Categorie;
use App\Http\Requests\BookRequest;

class CategorieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // display all categories
    public function list(){
        $items = Categorie::orderBy('name', 'asc')->get();

        return view(
            'categorie.list',
            [
                'title' => 'Kategorijas',
                'items' => $items,
            ]
        );
    }

    // display new categorie form
    public function create() {

        $razotajs = Razotajs::orderBy('name', 'asc')->get();
        $car = Car::orderBy('name', 'asc')->get();

        return view(
            'categorie.form',
            [
                'title' => 'Pievienot jaunu modeli',
                'categorie' => new Categorie(),
                'categorie' => $categorie,
            ]
        );
    }

        // save new categorie
        public function put(BookRequest $request)
        {
            $car = new Categorie();
            $this->saveCarData($categorie, $request);
            return redirect('/categories');
        }

        // Update categorie
        public function update(Categorie $categorie) {

            $razotajs = Razotajs::orderBy('name', 'asc')->get();
            $car = Car::orderBy('name', 'asc')->get();
            
            return view(
                'categorie.form',
                [
                    'title' => 'Rediģēt kategoriju',
                    'categorie' => $categorie,
                    'car' => $car,
                ]
            );
        }

        // save new car
        public function patch(Categorie $categorie, BookRequest $request)
        {
            $this->saveCategorieData($categorie, $request);
            return redirect('/categories/update');
        }

        public function delete(Categorie $categorie){
            $categorie->delete();
            return redirect('/categories');
        }

        private function saveCategorieData(Categorie $categorie, BookRequest $request) {
            $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'categorie_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
            ]);
            $categorie->fill($validatedData);
            $categorie->display = (bool) ($validatedData['display'] ?? false);
            if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $categorie->image = $uploadedFile->storePubliclyAs(
            '/',
            $name . '.' . $extension,
            'uploads'
            );
            }
            $categorie->save();

            }
}
