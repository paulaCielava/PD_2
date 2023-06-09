<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Razotajs;
use App\Models\Car;
use App\Models\Categorie;
use App\Http\Requests\BookRequest;

class CategorieController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    // parāda visus categories
    public function list() {
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
                'title' => 'Pievienot jaunu kategoriju',
                'categorie' => new Categorie()
            ]
        );
    }

    // save new categorie
    public function put(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $categorie = new Categorie();
        $categorie->name = $validatedData['name'];
        $categorie->save();

        return redirect('/categories');
    }

    // display categorie update form
    public function update(Categorie $razotajs){
        return view(
            'categorie.form',
            [
                'title' => 'Rediģēt kategoriju',
                'categorie' => $categorie,
            ]
        );
    }

   // update existing objects
   public function patch(Categorie $categorie, Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $categorie->name = $validatedData['name'];
        $categorie->save();

        return redirect('/categories');
   }


   // ierakstu dzēšana
   public function delete(Categorie $categorie){
        $categorie->delete();
        return redirect('/categories');
   }
}
