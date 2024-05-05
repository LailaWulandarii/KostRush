<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PenghuniController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KamarController;
use App\Http\Controllers\API\KostController;
use App\Http\Controllers\API\ProfilController;
use App\Http\Controllers\API\TransaksiController;
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
// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/profile', function () {
//         // ...
//     });
//     Route::get('/posts', function () {
//         // ...
//     });
// });
Route::post('/apilogin', [AuthController::class, 'login']);
Route::get('/apipenghuni', [PenghuniController::class, 'index']);
Route::get('/apikost', [KostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/filterKostKecamatan', [KostController::class, 'filterKostKecamatan'])->middleware('auth:sanctum');
Route::get('/apikamar', [KamarController::class, 'index'])->middleware('auth:sanctum');
Route::get('/filterKamarKecamatan', [KamarController::class, 'filterKamarKecamatan'])->middleware('auth:sanctum');
Route::get('/apitransaksi', [TransaksiController::class, 'index'])->middleware('auth:sanctum');
Route::get('/apidetailprofil', [ProfilController::class, 'index'])->middleware('auth:sanctum');
Route::put('/apieditprofil', [ProfilController::class, 'update'])->middleware('auth:sanctum');

// Route::get('/kost/filter-by-kecamatan/{kecamatan}', 'API\KostController@filterKostByKecamatan');


// // Tambahkan rute yang menggunakan JWT middleware
// Route::middleware('jwt.auth')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/coba', function () {
//     return 'halo, saya belajar api';
// });

// Route::apiResource('apipenghuni', PenghuniController::class)->middleware('auth:api');
// Route::post('/apiregister', [AuthController::class, 'register']);
// // Route::resource('loginAPI', HomeController::class);

// // Route untuk login pengguna
// Route::post('/apilogin', [AuthController::class, 'login']);

// // Route untuk logout pengguna
// Route::post('/apilogout', [AuthController::class, 'logout'])->middleware('auth:api');
// Route::get('/apipenghuni', [AuthController::class, 'login']);
