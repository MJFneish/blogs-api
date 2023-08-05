<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::apiResource("blogs", BlogController::class);

//Route::middleware('auth:api')->group(function () {
//    Route::post('auth/login', [AuthController::class, 'login']);
//    Route::post('auth/register', [AuthController::class, 'register']);
//    Route::post('auth/check-auth', [AuthController::class, 'checkAuth']);
//});
Route::middleware('api')->group(function () {
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::post('auth/check-auth', [AuthController::class, 'checkAuth']);
});
