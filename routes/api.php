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

    Route::prefix('users')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{userId}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{userId}', [UserController::class, 'update']);
        Route::delete('/{userId}', [UserController::class, 'destroy']);

        Route::post('/associate/cars/', [UserCarController::class, 'associate']);
        Route::delete('/disassociate/cars/', [UserCarController::class, 'disassociate']);
        Route::get('/{userId}/cars', [UserCarController::class, 'getUserCars']);
    });

    Route::prefix('cars')->group(function() {
        Route::get('/', [CarController::class, 'index']);
        Route::get('/{carsId}', [CarController::class, 'show']);
        Route::post('/', [CarController::class, 'store']);
        Route::put('/{carsId}', [CarController::class, 'update']);
        Route::delete('/{carsId}', [CarController::class, 'destroy']);
    });
});