<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class LaporanSupplierController extends Controller
{
   public function index()
   {
    $suppliers = Supplier::all();

    return view('pemilik.laporan-supplier', [
        'suppliers'    => $suppliers,
        'totalSupplier' => $suppliers->count(),
    ]);
}
}
