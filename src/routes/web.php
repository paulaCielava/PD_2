<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RazotajsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


Route::get('/razotajs', [RazotajsController::class, 'list']);

Route::get('/razotajs/create', [RazotajsController::class, 'create']);

Route::post('/razotajs/put',  [RazotajsController::class, 'put']);

Route::get('razotajs/update/{razotajs}', [RazotajsController::class, 'update']);

Route::post('razotajs/patch/{razotajs}', [RazotajsController::class, 'patch']);

Route::post('razotajs/delete/{razotajs}',[RazotajsController::class, 'delete']);