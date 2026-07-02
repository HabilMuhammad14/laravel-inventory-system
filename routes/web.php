<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KategoriController;
use App\http\controllers\SupplierController;
use App\http\controllers\BarangController;
use App\http\controllers\TransaksiMasukController;
use App\http\controllers\TransaksiKeluarController;

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


Route::prefix('barang')->group(function(){
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/hapus/{barang}', [BarangController::class, 'destroy'])->name('barang.hapus');
    Route::get('/edit/{barang}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/update/{barang}', [BarangController::class, 'update'])->name('barang.update');
});


Route::prefix('transaksiMasuk')->group(function(){
    Route::get('/', [TransaksiMasukController::class, 'index'])->name('transaksiMasuk.index');
    Route::post('/', [TransaksiMasukController::class, 'store'])->name('transaksiMasuk.store');
    Route::get('/hapus/{transaksi}', [TransaksiMasukController::class, 'destroy'])->name('transaksiMasuk.hapus');
    Route::get('/edit/{transaksi}', [TransaksiMasukController::class, 'edit'])->name('transaksiMasuk.edit');
    Route::put('/update/{transaksi}', [TransaksiMasukController::class, 'update'])->name('transaksiMasuk.update');
});

Route::prefix('transaksiKeluar')->group(function(){
    Route::get('/', [TransaksiKeluarController::class, 'index'])->name('transaksiKeluar.index');
    Route::post('/', [TransaksiKeluarController::class, 'store'])->name('transaksiKeluar.store');
    Route::get('/hapus/{transaksi}', [TransaksiKeluarController::class, 'destroy'])->name('transaksiKeluar.hapus');
    Route::get('/edit/{transaksi}', [TransaksiKeluarController::class, 'edit'])->name('transaksiKeluar.edit');
    Route::put('/update/{transaksi}', [TransaksiKeluarController::class, 'update'])->name('transaksiKeluar.update');
});
