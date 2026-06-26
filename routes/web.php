<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\KategoriController;
use App\http\controllers\SupplierController;

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


