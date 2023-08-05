<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource("blogs", BlogController::class);

Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login');
    Route::post('auth/register', 'register');
    Route::post('auth/check-auth', 'checkAuth');
});
Route::middleware('auth:api')->controller(AuthController::class)->group(function () {
    Route::post('auth/logout', 'logout');
});
