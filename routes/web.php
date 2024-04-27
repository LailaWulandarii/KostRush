<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('auth/login', [LoginController::class, 'index'])->name('auth.login');

//==============================================LOGIN==============================================//
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
//==============================================REGISTER==============================================//
Route::get('/register_akun', [RegisterController::class, 'registerAkunForm'])->name('register_akun_form');
Route::post('/register_akun', [RegisterController::class, 'registerAkun'])->name('register_akun_process');
//==============================================EMAIL VERIFY==============================================//
Route::get('/email', [LoginController::class, 'email'])->name('email');
//==============================================LOGOUT==============================================//
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {    
    //==============================================PENGHUNI==============================================//
    Route::resource('penghuni' , PenghuniController::class)->only(['index',  'update']);
    //==============================================KAMAR==============================================//
    Route::resource('kamar' , KamarController::class)->only(['index', 'store', 'update', 'destroy']);
    //==============================================KOST==============================================//
    Route::resource('kost' , KostController::class)->only(['create','index','store', 'update']);
    //==============================================TRANSAKSI==============================================//
    Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware('auth');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayat'])->middleware('auth');
    //==============================================PROFIL==============================================//
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::put('/profil/{id}', [ProfileController::class, 'update'])->name('profil.update');
    Route::put('/profil/{id}/update-password', [ProfileController::class, 'updatePassword'])->name('profil.update-password');
    Route::delete('/profil/{id}', [ProfileController::class, 'destroy'])->name('profil.destroy');

    //==============================================DLL==============================================//
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/main', [HomeController::class, 'main'])->name('main');
});
