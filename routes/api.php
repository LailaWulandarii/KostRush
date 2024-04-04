<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PenghuniController;
use App\Http\Controllers\API\AuthController;
use Tymon\JWTAuth\Facades\JWTAuth;
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



// Tambahkan rute yang menggunakan JWT middleware
Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/coba', function () {
    return 'halo, saya belajar api';
});

Route::apiResource('apipenghuni', PenghuniController::class)->middleware('auth:api');
Route::post('/apiregister', [AuthController::class, 'register']);// Route::resource('apipenghuni', 'API\PenghuniController');
// Route::resource('loginAPI', HomeController::class);

// Route untuk login pengguna
Route::post('/apilogin', [AuthController::class, 'login']);

// Route untuk logout pengguna
Route::post('/apilogout', [AuthController::class, 'logout'])->middleware('auth:api');
