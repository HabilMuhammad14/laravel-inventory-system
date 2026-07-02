<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\TransaksiMasuk;
use App\Models\TransaksiKeluar;
use App\Models\TransaksiRetur;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    public function index()
    {
        $barangs = Barang::withSum('TransaksiMasuk', 'jumlah')
                         ->withSum('TransaksiKeluar', 'jumlah')
                         ->withSum('TransaksiRetur', 'jumlah')
                         ->get();

        $totalBarang = $barangs->count();
        $totalMasuk  = TransaksiMasuk::sum('jumlah');
        $totalKeluar = TransaksiKeluar::sum('jumlah');
        $totalRetur  = TransaksiRetur::sum('jumlah');
        $totalStok   = Barang::sum('stok');

        return view('pengguna.laporanStok', compact(
            'barangs',
            'totalBarang',
            'totalMasuk',
            'totalKeluar',
            'totalRetur',
            'totalStok'
        ));
    }
}
