<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnergyController;

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

Route::middleware(['throttle:200,1'])->group(function () {
    Route::group(['prefix' => 'energy'], function () {
        Route::get('/hall', [EnergyController::class, 'getHall']);
    });
    
    Route::group(['prefix' => 'energy'], function () {
        Route::post('/diff', [EnergyController::class, 'getDiff']);
    });
    
    Route::group(['prefix' => 'energy'], function () {
        Route::get('/consumpt', [EnergyController::class, 'getConsumpt']);
    });
});