<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;

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
    return view('auth.login');
});

Route::get('/home',[HomeController::class,'index']);

Route::get('/admin',[AdminController::class,'index']);
// buku
Route::get('/buku',[BukuController::class,'index'])->middleware(['auth', 'verified'])->name('admin');
Route::get('/add-buku',[BukuController::class,'tambah']);
Route::post('/add-buku',[BukuController::class,'store']);
Route::get('/edit-buku/{slug}',[BukuController::class,'edit']);
Route::put('/edit-buku/{slug}',[BukuController::class,'update']);
Route::get('/delete-buku/{slug}',[BukuController::class,'delete']);
Route::delete('/destroy-buku/{slug}',[BukuController::class,'destroy']);
Route::get('/buku-sampah',[BukuController::class,'deletedbuku']);
Route::get('/restore-buku/{slug}',[BukuController::class,'restore']);
Route::get('/detailbuku/{slug}',[BukuController::class,'detailbuku']);


// kategori
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/add-kategori',[KategoriController::class,'tambah']);
Route::post('/add-kategori',[KategoriController::class,'store']);
Route::get('/edit-kategori/{slug}',[KategoriController::class,'edit']);
Route::put('/edit-kategori/{slug}',[KategoriController::class,'update']);
Route::get('/delete-kategori/{slug}',[KategoriController::class,'delete']);
Route::delete('/destroy-kategori/{slug}',[KategoriController::class,'destroy']);


Route::get('/adminpeminjaman',[PeminjamanController::class,'admin']);
// user
Route::get('/user',[UserController::class,'index']);
Route::get('/detail-user/{slug}',[UserController::class,'show']);
Route::get('/delete-user/{slug}',[UserController::class,'delete']);
Route::delete('/destroy-user/{slug}',[UserController::class,'destroy']);


Route::get('/list-buku',[ClientController::class,'index']);
// peminjaman
Route::get('/peminjaman',[PeminjamanController::class,'index']);
Route::post('/peminjaman',[PeminjamanController::class,'store']);
Route::get('/datapeminjaman',[PeminjamanController::class,'datapeminjaman']);
Route::get('/approved/{id}',[PeminjamanController::class,'approved']);
// koleksi
Route::get('/koleksi',[KoleksiController::class,'index']);
Route::post('/koleksi',[KoleksiController::class,'store']);
Route::delete('/delete-koleksi/{id}',[KoleksiController::class,'delete']);
// 
Route::post('/ulasan',[UlasanController::class,'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
