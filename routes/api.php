<?php

use App\Http\Controllers\API\ProfileController;
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

//Auth
Route::post('/apilogin', [AuthController::class, 'login']);
Route::post('/apiregister', [AuthController::class, 'register']);
Route::post('/apilogout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Penghuni
Route::apiResource('apipenghuni', PenghuniController::class);

//Kamar
Route::apiResource('apikamar', KamarController::class);
Route::post('filterkamarkecamatan', [KamarController::class, 'filterKamarKecamatan']);
Route::get('kamartermurah', [KamarController::class, 'kamarTermurah']);
Route::get('kamarterpopuler', [KamarController::class, 'kamarTerpopuler']);
Route::get('kamarkosong', [KamarController::class, 'kamarKosong']);

//Kost
Route::get('apikost', [KostController::class, 'index']);
Route::post('filterkostkecamatan', [KostController::class, 'filterKostKecamatan']);
Route::post('searchkost', [KostController::class, 'searchKost']);

//Transaksi
Route::get('apitransaksi', [TransaksiController::class, 'index'])->middleware('auth:sanctum');
Route::post('apiaddtransaksi', [TransaksiController::class, 'addTransaksi'])->middleware('auth:sanctum');

//Profile
Route::get('apigetprofile', [ProfileController::class, 'index'])->middleware('auth:sanctum');
Route::put('apieditpassword', [ProfileController::class, 'updatePassword'])->middleware('auth:sanctum');