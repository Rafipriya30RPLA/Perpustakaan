<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KirimEmailController;
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


// peminjam
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
Route::get('/pengembalian', [PeminjamController::class, 'index2'])->name('pengembalian.index');
Route::get('/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
Route::get('/peminjam/create', [PeminjamController::class, 'create'])->name('peminjam.create');
Route::post('/peminjam', [PeminjamController::class, 'store'])->name('peminjam.store');
Route::get('/peminjam/{peminjam}', [PeminjamController::class, 'show'])->name('peminjam.show');
Route::get('/peminjam/{peminjam}/edit', [PeminjamController::class, 'edit'])->name('peminjam.edit');
Route::post('/peminjam/{peminjam}', [PeminjamController::class, 'update'])->name('peminjam.update');
Route::delete('/peminjam/{peminjam}/destroy', [PeminjamController::class, 'destroy'])->name('peminjam.destroy');
Route::delete('/pengembalian/{pengembalian}/destroy', [PeminjamController::class, 'destroy2'])->name('pengembalian.destroy');


});

Route::middleware(['User','verified'])->group(function () {
Route::resource('review', ReviewController::class);
// daftarbuku
Route::get('/daftarbuku',[TambahbukuController::class,'daftarbuku']);
Route::get('/daftarbuku/preview/{id}',[TambahbukuController::class,'preview'])->name('daftarbuku-preview');
Route::post('/preview/post/review', [TambahBukuController::class, 'postreview'])->name('daftarbuku-review');
Route::get('profil', [HomeController::class, 'profil']);
Route::post('simpanprofil/{id}', [HomeController::class, 'simpanprofil'])->name('simpanprofil');
Route::post('/tambahbuku/borrow/{id}', [TambahbukuController::class,'borrowBook'])->name('tambahbuku.borrow');
Route::post('/nav-side-admin/{id}', [HomeController::class,'lihatprofil'])->name('nav-side-admin');
// Route::get('/',[KirimEmailController::class,'index']);
// Route::get('/daftarbuku/preview/{id}', 'TambahbukuController@preview')->name('daftarbuku.preview');


});
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Auth::routes(['verify'=>true]);
