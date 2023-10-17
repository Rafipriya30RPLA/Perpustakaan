<?php
use App\Http\Controllers\PeminjamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\TambahbukuController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ReviewController;

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
    return view('auth/login');
});



// Route::get('/login',[SesiController::class,'login'])->name('login');
// Route::get('/register',[SesiController::class,'register'])->name('register');
// Route::post('registeruser',[SesiController::class,'registeruser'])->name('registeruser');
// Route::post('loginproses',[SesiController::class,'loginproses'])->name('loginproses');
// Route::get('logout',[SesiController::class,'logout'])->name('logout');


Route::middleware(['Admin'])->group(function () {
Route::resource('tambahbuku', TambahbukuController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('penulis', PenulisController::class);
});

Route::middleware(['User'])->group(function () {
Route::resource('review', ReviewController::class);
Route::resource('peminjam', PeminjamController::class);
Route::get('/daftarbuku',[TambahbukuController::class,'daftarbuku']);
Route::get('/daftarbuku/preview/{id}',[TambahbukuController::class,'preview'])->name('daftarbuku.preview');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Auth::routes(['verify'=>true]);
