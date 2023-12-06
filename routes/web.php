<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Models\Brand;
use App\Models\Kategori;


Route::controller(AuthController::class)->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerSimpan'])->name('register.simpan');
    
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginAksi'])->name('login.aksi');
    
    Route::get('logout', 'logout')->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard')->middleware('admin');

Route::prefix('brand')->group(function(){
    Route::middleware(['admin'])->group(function () {
        Route::get('', [BrandController::class, 'index'])->name('brand');
        Route::get('tambah', [BrandController::class, 'tambah'])->name('brand.tambah');
        Route::post('tambah', [BrandController::class, 'simpan'])->name('brand.tambah.simpan');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('edit/{id}', [BrandController::class, 'update'])->name('brand.tambah.update');
        Route::get('hapus/{id}', [BrandController::class, 'hapus'])->name('brand.hapus');
        Route::put('restore/{id_brand}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::delete('hapusPermanent/{id_brand}', [BrandController::class, 'hapusPermanent'])->name('brand.hapusPermanent');
    });

});

Route::prefix('kategori')->group(function(){
    Route::middleware(['admin'])->group(function () {
        Route::get('', [KategoriController::class, 'index'])->name('kategori');
        Route::get('tambah', [KategoriController::class, 'tambah'])->name('kategori.tambah');
        Route::post('tambah', [KategoriController::class, 'simpan'])->name('kategori.tambah.simpan');
        Route::get('edit/{id_kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('edit/{id_kategori}', [KategoriController::class, 'update'])->name('kategori.tambah.update');
        Route::get('hapus/{id_kategori}', [KategoriController::class, 'hapus'])->name('kategori.hapus');
        Route::put('restore/{id_kategori}', [KategoriController::class, 'restore'])->name('kategori.restore');
        Route::delete('hapusPermanent/{id_kategori}', [KategoriController::class, 'hapusPermanent'])->name('kategori.hapusPermanent');
    });

});

Route::prefix('produk')->group(function(){
    Route::middleware(['admin'])->group(function () {
        Route::get('', [ProdukController::class, 'index'])->name('produk');
        Route::get('tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
        Route::post('tambah', [ProdukController::class, 'simpan'])->name('produk.tambah.simpan');
        Route::get('edit/{id_produk}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('edit/{id_produk}', [ProdukController::class, 'update'])->name('produk.tambah.update');
        Route::get('hapus/{id_produk}', [ProdukController::class, 'hapus'])->name('produk.hapus');
        Route::put('restore/{id_produk}', [ProdukController::class, 'restore'])->name('produk.restore');
        Route::delete('hapusPermanent/{id_produk}', [ProdukController::class, 'hapusPermanent'])->name('produk.hapusPermanent');
    });
});

// Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/join-page', [JoinController::class, 'index'])->name('join.page')->middleware('admin');


