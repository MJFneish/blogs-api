<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
//Route::post('api/auth/login', [AuthController::class, 'login']);
//Route::post('api/auth/register', [AuthController::class, 'register']);
//Route::post('api/check-auth', [AuthController::class, 'checkAuth']);
