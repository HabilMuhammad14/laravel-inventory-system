<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return view('pengguna.barang', compact('barangs', 'kategoris'));
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
            'kode_barang' => 'required|string|max:10|unique:barang,kode_barang',
            'nama_barang' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategori,id',
            'satuan' => 'required|string|max:20',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);
        Barang::create($validated);
        return redirect()->route('barang.index');
        }

        /**
         * Display the specified resource.
        */
        public function show(Barang $barang): Response
        {
            //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Barang $barang)
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return view('pengguna.barang', ['barangs' => $barangs, 'editBarang' => $barang, 'kategoris' => $kategoris]);
        }

        /**
         * Update the specified resource in storage.
        */
        public function update(Request $request, Barang $barang)
        {
            $validated = $request->validate([
                'kode_barang' => 'required|string|max:10|unique:barang,kode_barang',
                'nama_barang' => 'required|string|max:100',
                'kategori_id' => 'required|exists:kategori,id',
                'satuan' => 'required|string|max:20',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
            ]);
            $barang->update($validated);
            return redirect()->route('barang.index');
        }

            /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
