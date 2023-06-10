<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\CategorieRequest;



class CategorieController extends Controller
{
    // display all genres
    public function list()
    {
        $items = Categorie::orderBy('id', 'asc')->get();
        return view(
            'categorie.list',
            [
                'title' => 'Kategorijas',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'categorie.form',
            [
                'title' => 'Pievienot kategoriju',
                'categorie' => new Categorie()
            ]
        );
    }

    public function put(CategorieRequest $request)
    {
        $categorie = new Categorie();
        $this->saveCategorieData($categorie, $request);
        return redirect('/categories');
    }

    public function update(Categorie $categorie)
    {
        return view(
            'categorie.form',
            [
                'title' => 'Rediģēt kategoriju',
                'categorie' => $categorie
            ]
        );
    }

    public function patch(Categorie $categorie, CategorieRequest $request)
    {
        $this->saveCategorieData($categorie, $request);
        return redirect('/categories');
    }

    public function delete(Categorie $categorie)
    {
        $categorie->delete();
        return redirect('/categories');
    }

    private function saveCategorieData(Categorie $categorie, CategorieRequest $request)
    {
        $validatedData = $request->validated();
        $categorie->fill($validatedData);
        $categorie->save();
    }
}