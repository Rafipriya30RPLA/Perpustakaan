<?php

<<<<<<< Updated upstream
=======
use App\Http\Controllers\PeminjamController;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenerbitController;
<<<<<<< Updated upstream
use App\Http\Controllers\TambahbukuController;
=======
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ReviewController;
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
Route::resource('tambahbuku', TambahbukuController::class);
Route::resource('penerbit', PenerbitController::class);
Route::get('/login',[SesiController::class,'login'])->name('login');
Route::get('/register',[SesiController::class,'register'])->name('register');
Route::post('registeruser',[SesiController::class,'registeruser'])->name('registeruser');
Route::post('loginproses',[SesiController::class,'loginproses'])->name('loginproses');
=======
Route::resource('penerbit', PenerbitController::class);
Route::resource('penulis', PenulisController::class);
Route::resource('review', ReviewController::class);
Route::resource('peminjam', PeminjamController::class);         
>>>>>>> Stashed changes
