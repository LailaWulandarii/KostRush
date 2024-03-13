<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register_proses', [RegisterController::class, 'register_proses'])->name('register_proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/create_penghuni', [UserController::class, 'create_penghuni'])->name('pages.create_penghuni');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/main', [HomeController::class, 'main'])->name('main');
    Route::get('/penghuni', [HomeController::class, 'penghuni'])->name('penghuni');
    Route::get('/data-kamar', [HomeController::class, 'kamar'])->name('kamar');
    Route::get('/data-kost', [HomeController::class, 'kost'])->name('kost');
    Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi');
});
