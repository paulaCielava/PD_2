<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Razotajs;

class RazotajsController extends Controller
{
    // parāda visus ražotājus
    public function list() {
        $items = Razotajs::orderBy('name', 'asc')->get();
        return view(
            'razotajs.list',
            [
                'title' => 'Razotaji',
                'items' => $items,   
            ]
        );
    }

    // display new razotajs form
    public function create() {
        return view(
            'razotajs.form',
            [
                'title' => 'Pievienot jaunu ražotāju',
                'razotajs' => new Razotajs(),
            ]
        );
    }

    // save new razotajs
    public function put(Request $request) {
        $validateDate = $request->validate([
            'name' => 'required',
        ]);

        $razotajs = new Razotajs();
        $razotajs->name = $validateDate['name'];
        $razotajs->save();

        return redirect('/razotajs');
    }

    // display razotajs update form
    public function update(Razotajs $razotajs){
        return view(
            'razotajs.form',
            [
                'title' => 'Rediģēt ražotāju',
                'razotajs' => $razotajs,
            ]
        );
    }

   // update existing objects
   public function patch(Razotajs $razotajs, Request $request){
        $validateDate = $request->validate([
            'name' => 'required',
        ]);

        $razotajs->name = $validateDate['name'];
        $razotajs->save();

        return redirect('/razotajs');
   }


   // ierakstu dzēšana
   public function delete(Razotajs $razotajs){
        $razotajs->delete();
        return redirect('/razotajs');
   }
}
