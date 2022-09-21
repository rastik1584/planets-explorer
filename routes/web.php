<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PlanetsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/planets', [PlanetsController::class, 'index']);
Route::get('/sync', [PlanetsController::class, 'planetsSync']);
