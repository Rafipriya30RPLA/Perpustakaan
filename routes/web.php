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
// daftarbuku
Route::get('/daftarbuku',[TambahbukuController::class,'daftarbuku']);
Route::get('/daftarbuku/preview/{id}',[TambahbukuController::class,'preview']);
Route::post('/preview/post/review', [TambahBukuController::class, 'postreview']);
Route::post('/tambahbuku/borrow/{id}', [TambahbukuController::class,'borrowBook'])->name('tambahbuku.borrow');
// Route::get('/daftarbuku/preview/{id}', 'TambahbukuController@preview')->name('daftarbuku.preview');

// peminjam
Route::get('/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
Route::get('/peminjam/create', [PeminjamController::class, 'create'])->name('peminjam.create');
Route::post('/peminjam', [PeminjamController::class, 'store'])->name('peminjam.store');
Route::get('/peminjam/{peminjam}', [PeminjamController::class, 'show'])->name('peminjam.show');
Route::get('/peminjam/{peminjam}/edit', [PeminjamController::class, 'edit'])->name('peminjam.edit');
Route::post('/peminjam/{peminjam}', [PeminjamController::class, 'update'])->name('peminjam.update');
Route::delete('/peminjam/{peminjam}/destroy', [PeminjamController::class, 'destroy'])->name('peminjam.destroy');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Auth::routes(['verify'=>true]);
