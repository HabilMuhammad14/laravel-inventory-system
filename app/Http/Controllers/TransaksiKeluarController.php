<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TransaksiKeluar;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\User;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = TransaksiKeluar::all();
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $users = User::all();
        return view('pengguna.transaksi.keluar', compact('barangs', 'suppliers', 'users', 'transaksis'));
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
        'kode_transaksi_keluar' => 'required|string|max:255|unique:transaksi_keluar,kode_transaksi_keluar',
        'barang_id' => 'required|exists:barangs,id',
        'user_id' => 'required|exists:users,id',
        'tanggal' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'keterangan' => 'nullable|string',
      ]);
      TransaksiKeluar::create($validated);
      return redirect()->route('transaksiKeluar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiKeluar $transaksi)
    {
        $transaksis = TransaksiKeluar::all();
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $users = User::all();
        return view('pengguna.transaksi.keluar', ['transaksis' => $transaksis, 'editTransaksi' => $transaksi, 'barangs' => $barangs, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiKeluar $transaksi)
    {
        $validated = $request->validate([
          'kode_transaksi_keluar' => 'required|string|max:255',
          'barang_id' => 'required|exists:barangs,id',
          'user_id' => 'required|exists:users,id',
          'tanggal' => 'required|date',
          'jumlah' => 'required|integer|min:1',
          'keterangan' => 'nullable|string',
        ]);
        $transaksi->update($validated);
        return redirect()->route('transaksiKeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiKeluar $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksiMasuk.index');
    }
}
