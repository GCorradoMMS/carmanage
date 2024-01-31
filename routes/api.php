<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserCarController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
// });


Route::prefix('v1')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('cars', CarController::class);
    Route::post('/users/{userId}/associate/cars/{carId}', [UserCarController::class, 'associate']);
    Route::delete('/users/{userId}/disassociate/cars/{carId}', [UserCarController::class, 'disassociate']);
    Route::get('/users/{userId}/cars', [UserCarController::class, 'getUserCars']);
});