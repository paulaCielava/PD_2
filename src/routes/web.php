<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RazotajsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;

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

// Razotajs routes
Route::get('/razotajs', [RazotajsController::class, 'list']);

Route::get('/razotajs/create', [RazotajsController::class, 'create']);

Route::post('/razotajs/put',  [RazotajsController::class, 'put']);

Route::get('/razotajs/update/{razotajs}', [RazotajsController::class, 'update']);

Route::post('/razotajs/patch/{razotajs}', [RazotajsController::class, 'patch']);

Route::post('/razotajs/delete/{razotajs}',[RazotajsController::class, 'delete']);


// Car routes
Route::get('/cars', [CarController::class, 'list']);
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars/put',  [CarController::class, 'put']);
Route::get('/cars/update/{razotajs}', [CarController::class, 'update']);
Route::post('/cars/patch/{razotajs}', [CarController::class, 'patch']);
Route::post('/cars/delete/{razotajs}',[CarController::class, 'delete']);


// Categorie routes
Route::get('/categories', [CategorieController::class, 'list']);
Route::get('/categories/create', [CategorieController::class, 'create']);
Route::post('/categories/put',  [CategorieController::class, 'put']);
Route::get('/categories/update/{categorie}', [CategorieController::class, 'update']);
Route::post('/categories/patch/{categorie}', [CategorieController::class, 'patch']);
Route::post('/categories/delete/{categorie}',[CategorieController::class, 'delete']);


// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);


// Dara routes
// Data routes
Route::prefix('data')->group(function(){
    Route::get('/get-top-cars', [DataController::class, 'getTopCars']);
    Route::get('/get-car/{car}', [DataController::class, 'getCar']);
    Route::get('/get-related-cars/{car}', [DataController::class, 'getRelatedCars']);
});

