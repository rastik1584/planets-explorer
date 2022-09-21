<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('top-ten-planets', [\App\Http\Controllers\ApiPlanetsController::class, 'topTenLargestPlanets']);
Route::get('all-species-in-planets', [\App\Http\Controllers\ApiPlanetsController::class, 'allSpeciesLivingInPlanets']);

Route::post('create-logbook', [\App\Http\Controllers\ApiLogBookController::class, 'store']);
Route::get('all-logbooks', [\App\Http\Controllers\ApiLogBookController::class, 'show']);
