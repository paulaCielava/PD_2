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
}
