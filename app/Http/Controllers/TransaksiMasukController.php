<?php

namespace App\Http\Controllers;

use App\Models\TransaksiMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class transaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = TransaksiMasuk::all();
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $users = Supplier::all();
        return view('pengguna.transaksi.masuk', compact('barangs', 'suppliers', 'users', 'transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'kode_transaksi_masuk' => 'required|string|max:255|unique:transaksi_masuk,kode_transaksi_masuk',
        'barang_id' => 'required|exists:barangs,id',
        'supplier_id' => 'required|exists:suppliers,id',
        'user_id' => 'required|exists:users,id',
        'tanggal' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'keterangan' => 'nullable|string',
      ]);
      TransaksiMasuk::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr): RedirectResponse
    {
        //
    }
}
