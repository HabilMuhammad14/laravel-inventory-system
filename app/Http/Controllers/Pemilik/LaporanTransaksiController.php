<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanTransaksiController extends Controller
{
     public function index()
     {
         $transaksiMasuks = TransaksiMasuk::with(['barang', 'supplier', 'user'])->get();
         $transaksiKeluars = TransaksiKeluar::with(['barang', 'user'])->get();
         $transaksiReturs  = TransaksiRetur::with(['barang', 'supplier', 'user'])->get();
     
         $semua = collect()
             ->merge($transaksiMasuks->map(fn($t) => (object)[
                 'kode'       => $t->kode_transaksi_masuk,
                 'tanggal'    => $t->tanggal,
                 'jenis'      => 'masuk',
                 'barang'     => $t->barang,
                 'jumlah'     => $t->jumlah,
                 'supplier'   => $t->supplier,
                 'user'       => $t->user,
                 'keterangan' => $t->keterangan,
             ]))
             ->merge($transaksiKeluars->map(fn($t) => (object)[
                 'kode'       => $t->kode_transaksi_keluar,
                 'tanggal'    => $t->tanggal,
                 'jenis'      => 'keluar',
                 'barang'     => $t->barang,
                 'jumlah'     => $t->jumlah,
                 'supplier'   => null,
                 'user'       => $t->user,
                 'keterangan' => $t->keterangan,
             ]))
             ->merge($transaksiReturs->map(fn($t) => (object)[
                 'kode'       => $t->kode_retur,
                 'tanggal'    => $t->tanggal,
                 'jenis'      => 'retur',
                 'barang'     => $t->barang,
                 'jumlah'     => $t->jumlah,
                 'supplier'   => $t->supplier,
                 'user'       => $t->user,
                 'keterangan' => $t->keterangan,
             ]))
             ->sortBy('tanggal');
     
         return view('pemilik.laporan-transaksi', [
             'transaksis'    => $semua,
             'totalTransaksi'=> $semua->count(),
             'totalMasuk'    => $transaksiMasuks->count(),
             'totalKeluar'   => $transaksiKeluars->count(),
             'totalRetur'    => $transaksiReturs->count(),
         ]);
     }
}
