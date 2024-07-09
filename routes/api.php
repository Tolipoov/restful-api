<?php

use App\Http\Controllers\Country\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('country', [CountryController::class, 'countries']);
Route::get('country/{id}', [CountryController::class, 'countriesById']);
Route::post('country', [CountryController::class, 'countrySave']);
Route::put('country/{id}', [CountryController::class, 'countyEdit']);
Route::delete('country/{id}', [CountryController::class, 'countryDelete']);

