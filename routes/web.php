<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/register', function () {
//     return view('auth.register');
// });
 
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/create_penghuni', [UserController::class, 'create_penghuni'])->name('pages.create_penghuni');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/main', [HomeController::class, 'main'])->name('main');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/penghuni', [HomeController::class, 'penghuni'])->name('penghuni');
Route::get('/data_kamar', [HomeController::class, 'data_kamar'])->name('data_kamar');
Route::get('/data_kost', [HomeController::class, 'data_kost'])->name('data_kost');
Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi');
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin'], function () {
});

// Route::get('/login', [LoginController::class,'login'])->name('login');