<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanBarangController extends Controller
{
     public function index()
     {
         $barangs = Barang::with('kategori')->get();
         return view('pemilik.laporan-barang', [
             'barangs'       => $barangs,
             'totalBarang'   => $barangs->count(),
             'totalKategori' => Kategori::count(),
             'barangAman'    => $barangs->where('stok', '>', 20)->count(),
             'stokMenipis'   => $barangs->whereBetween('stok', [1, 20])->count(),
             'barangHabis'   => $barangs->where('stok', 0)->count(),
         ]);
     }
}
