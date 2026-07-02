<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TransaksiRetur;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\User;


class TransaksiReturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returs = TransaksiRetur::all();
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $users = User::all();
        return view('pengguna.transaksi.retur', compact('barangs', 'suppliers', 'users', 'returs'));
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
        'kode_transaksi_retur' => 'required|string|max:255|unique:transaksi_retur,kode_transaksi_retur',
        'barang_id' => 'required|exists:barangs,id',
        'supplier_id' => 'required|exists:suppliers,id',
        'user_id' => 'required|exists:users,id',
        'tanggal' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'keterangan' => 'nullable|string',
      ]);
      TransaksiRetur::create($validated);
      return redirect()->route('transaksiRetur.index');
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
    public function edit(TransaksiRetur $transaksi)
    {
        $returs = TransaksiRetur::all();
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $users = User::all();
        return view('pengguna.transaksi.retur', ['returs' => $returs, 'editRetur' => $transaksi, 'barangs' => $barangs, 'suppliers' => $suppliers, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiRetur $transaksi)
    {
        $validated = $request->validate([
          'kode_transaksi_retur' => 'required|string|max:255',
          'barang_id' => 'required|exists:barangs,id',
          'supplier_id' => 'required|exists:suppliers,id',
          'user_id' => 'required|exists:users,id',
          'tanggal' => 'required|date',
          'jumlah' => 'required|integer|min:1',
          'keterangan' => 'nullable|string',
        ]);
        $transaksi->update($validated);
        return redirect()->route('transaksiRetur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiRetur $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksiRetur.index');
    }

}
