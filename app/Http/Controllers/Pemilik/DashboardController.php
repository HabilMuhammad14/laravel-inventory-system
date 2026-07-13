<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
       return view('pemilik.dashboard', [
           'totalBarang'    => Barang::count(),
           'totalSupplier'  => Supplier::count(),
           'totalTransaksi' => TransaksiMasuk::count() + TransaksiKeluar::count(),
           'totalStok'      => Barang::sum('stok'),
           'stokMenipis'    => Barang::where('stok', '<=', 20)
                                     ->orderBy('stok', 'asc')
                                     ->get(),
       ]);
   }
}
