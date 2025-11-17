<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\Admin\KategoriController as AdminKategori;
use App\Http\Controllers\Dashboard\TokoController as D_Toko;
use App\Http\Controllers\Dashboard\ProdukController as D_Produk;

Route::get('/', [ProdukController::class,'index'])->name('home');

Route::get('/produk', [ProdukController::class,'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class,'show'])->name('produk.show');
Route::get('/toko/{id}', [TokoController::class,'show'])->name('toko.show');

// Auth
Route::get('/login',[AuthController::class,'showLogin'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'showRegister'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

// Dashboard member
Route::middleware(['auth','role:member'])->prefix('dashboard')->group(function(){
    Route::get('/toko',[D_Toko::class,'index'])->name('dashboard.toko');
    Route::resource('/produk', D_Produk::class)->parameters(['produk'=>'id']);
});

// Admin
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){
    Route::resource('/kategori', AdminKategori::class);
    // tambahkan resource user, toko, produk admin
});
