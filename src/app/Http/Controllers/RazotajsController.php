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
                'title' => 'Pievienot jaunu ražotāju'
            ]
        );
    }

    // save new razotajs
    public function put(Request $request) {
        $validateDate = $request->validate([
            'name' => 'required',
        ]);
    }

}
