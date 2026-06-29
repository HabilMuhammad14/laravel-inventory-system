<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KategoriController;
use App\http\controllers\SupplierController;
use App\http\controllers\BarangController;
use App\http\controllers\TransaksiMasukController;

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

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/hapus/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.hapus');
Route::get('/kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');

Route::get('/supplier', [SupplierController::class, 'index'] )->name('supplier.index');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
route::get('/supplier/hapus/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.hapus');
Route::get('/supplier/edit/{supplier}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/update/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/hapus/{supplier}', [BarangController::class, 'destroy'])->name('barang.hapus');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{barang}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/update/{barang}', [BarangController::class, 'update'])->name('barang.update');

Route::get('/transaksiMasuk', [TransaksiMasukController::class, 'index'])->name('transaksiMasuk.index');
Route::post('/transaksiMasuk', [TransaksiMasukController::class, 'store'])->name('transaksiMasuk.store');
Route::get('/transaksiMasuk/hapus/{transaksi}', [TransaksiMasukController::class, 'destroy'])->name('transaksiMasuk.hapus');

