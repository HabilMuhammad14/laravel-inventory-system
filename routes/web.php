<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TransaksiKeluarController;
use App\Http\Controllers\TransaksiReturController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanStokController;
use App\Http\Controllers\Pemilik\DashboardController as PemilikDashboardController;
use App\Http\Controllers\Pemilik\LaporanBarangController;
use App\Http\Controllers\Pemilik\LaporanTransaksiController;
use App\Http\Controllers\Pemilik\LaporanStokController as PemilikLaporanStokController;
use App\Http\Controllers\Pemilik\KelolaUserController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'pegawai'])->group(function () {

    Route::get('/pengguna/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/pengguna/laporan-stok', [LaporanStokController::class, 'index'])->name('laporan-stok.index');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/hapus/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.hapus');
    Route::get('/kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/hapus/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.hapus');
    Route::get('/supplier/edit/{supplier}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/update/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');

    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::post('/', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/hapus/{barang}', [BarangController::class, 'destroy'])->name('barang.hapus');
        Route::get('/edit/{barang}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/update/{barang}', [BarangController::class, 'update'])->name('barang.update');
    });

    Route::prefix('transaksiMasuk')->group(function () {
        Route::get('/', [TransaksiMasukController::class, 'index'])->name('transaksiMasuk.index');
        Route::post('/', [TransaksiMasukController::class, 'store'])->name('transaksiMasuk.store');
        Route::get('/hapus/{transaksi}', [TransaksiMasukController::class, 'destroy'])->name('transaksiMasuk.hapus');
        Route::get('/edit/{transaksi}', [TransaksiMasukController::class, 'edit'])->name('transaksiMasuk.edit');
        Route::put('/update/{transaksi}', [TransaksiMasukController::class, 'update'])->name('transaksiMasuk.update');
    });

    Route::prefix('transaksiKeluar')->group(function () {
        Route::get('/', [TransaksiKeluarController::class, 'index'])->name('transaksiKeluar.index');
        Route::post('/', [TransaksiKeluarController::class, 'store'])->name('transaksiKeluar.store');
        Route::get('/hapus/{transaksi}', [TransaksiKeluarController::class, 'destroy'])->name('transaksiKeluar.hapus');
        Route::get('/edit/{transaksi}', [TransaksiKeluarController::class, 'edit'])->name('transaksiKeluar.edit');
        Route::put('/update/{transaksi}', [TransaksiKeluarController::class, 'update'])->name('transaksiKeluar.update');
    });

    Route::prefix('transaksiRetur')->group(function () {
        Route::get('/', [TransaksiReturController::class, 'index'])->name('transaksiRetur.index');
        Route::post('/', [TransaksiReturController::class, 'store'])->name('transaksiReturController.store');
        Route::get('/hapus/{transaksi}', [TransaksiReturController::class, 'destroy'])->name('transaksiRetur.hapus');
        Route::get('/edit/{transaksi}', [TransaksiReturController::class, 'edit'])->name('transaksiRetur.edit');
        Route::put('/update/{transaksi}', [TransaksiReturController::class, 'update'])->name('transaksiRetur.update');
    });

});

Route::middleware(['auth', 'pemilik'])->group(function(){
    Route::get('/pemilik/dashboard', [PemilikDashboardController::class, 'index'])->name('pemilik.dashboard');
    Route::get('/pemilik/laporan-barang', [LaporanBarangController::class, 'index'])->name('pemilik.laporan-barang');
    Route::get('/pemilik/laporan-transaksi', [LaporanTransaksiController::class, 'index'])->name('pemilik.laporan-transaksi');
    Route::get('/pemilik/laporan-stok', [PemilikLaporanStokController::class, 'index'])->name('pemilik.laporan-stok');
    Route::get('/pemilik/kelola-user', [KelolaUserController::class, 'index'])->name('pemilik.kelola-user');
    Route::post('/pemilik/kelola-user', [KelolaUserController::class, 'store'])->name('pemilik.kelola-user.store');
    Route::get('/pemilik/kelola-user/hapus/{user}', [KelolaUserController::class, 'destroy'])->name('pemilik.kelola-user.hapus');
    Route::get('/pemilik/kelola-user/edit/{user}', [KelolaUserController::class, 'edit'])->name('pemilik.kelola-user.edit');
    Route::put('/pemilik/kelola-user/update/{user}', [KelolaUserController::class, 'update'])->name('pemilik.kelola-user.update');

});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
