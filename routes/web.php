<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;
use App\Models\Kamar;

Route::redirect('/', '/login');

//==============================================LOGIN==============================================//
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
//==============================================REGISTER==============================================//
Route::get('/register', [ControllersRegisterController::class, 'index'])->name('register');
Route::post('/register_proses', [ControllersRegisterController::class, 'register_proses'])->name('register_proses');
//==============================================EMAIL VERIFY==============================================//
Route::get('/email', [LoginController::class, 'email'])->name('email');
//==============================================LOGOUT==============================================//
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {    
    //==============================================PENGHUNI==============================================//
    Route::resource('penghuni' , PenghuniController::class)->only(['index', 'store', 'update', 'destroy']);
    // Route::get('/create-penghuni', [PenghuniController::class, 'create_penghuni'])->name('pages.create-penghuni');
    // Route::post('/users', [PenghuniController::class, 'store'])->name('users.store');
    // Route::get('/users/{id}/edit', [PenghuniController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{id}', [PenghuniController::class, 'update'])->name('users.update');
    // Route::get('/users/{id}/delete', [PenghuniController::class, 'destroy'])->name('users.destroy');
    // Route::get('/users/{id}', [PenghuniController::class, 'show'])->name('users.show');
    // Route::get('/penghuni', [PenghuniController::class, 'index'])->middleware('auth');
    //==============================================KAMAR==============================================//
    Route::get('/kamar', [KamarController::class, 'index'])->middleware('auth');
    Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
    Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::get('/kamar/{id}/delete', [KamarController::class, 'destroy'])->name('kamar.destroy');
    //==============================================KOST==============================================//
    Route::get('/kost', [KostController::class, 'index'])->middleware('auth');
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
