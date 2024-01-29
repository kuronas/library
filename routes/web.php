<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
Route::get('/buku',[BukuController::class,'index']);
Route::get('/add-buku',[BukuController::class,'tambah']);
Route::post('add-buku',[BukuController::class,'store']);
Route::get('edit-buku/{slug}',[BukuController::class,'edit']);
Route::post('edit-buku/{slug}',[BukuController::class,'update']);

// kategori
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/add-kategori',[KategoriController::class,'tambah']);
Route::post('add-kategori',[KategoriController::class,'store']);
Route::get('/edit-kategori/{slug}',[KategoriController::class,'edit']);
Route::put('edit-kategori/{slug}',[KategoriController::class,'update']);
Route::get('/delete-kategori/{slug}',[KategoriController::class,'delete']);
Route::get('/destroy-kategori/{slug}',[KategoriController::class,'destroy']);


Route::get('/peminjaman',[PeminjamanController::class,'index']);
Route::get('/user',[AkunController::class,'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
