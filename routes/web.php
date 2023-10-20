<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\TambahbukuController;

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


Route::middleware(['Admin'])->group(function () {
Route::resource('tambahbuku', TambahbukuController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('penulis', PenulisController::class);
Route::resource('karyawan', KaryawanController::class);
Route::get('dashboard', [PenerbitController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['User'])->group(function () {
Route::resource('review', ReviewController::class);
// daftarbuku
Route::get('/dashboard',[HomeController::class,'dashboard']);
Route::get('/daftarbuku',[TambahbukuController::class,'daftarbuku']);
Route::get('/daftarbuku/preview/{id}',[TambahbukuController::class,'preview'])->name('daftarbuku');
Route::post('/preview/post/review', [TambahBukuController::class, 'postreview']);
Route::get('profil', [HomeController::class, 'profil']);
Route::post('simpanprofil/{id}', [HomeController::class, 'simpanprofil'])->name('simpanprofil');
Route::post('/tambahbuku/borrow/{id}', [TambahbukuController::class,'borrowBook'])->name('tambahbuku.borrow');
Route::post('/nav-side-admin/{id}', [HomeController::class,'lihatprofil'])->name('nav-side-admin');
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
