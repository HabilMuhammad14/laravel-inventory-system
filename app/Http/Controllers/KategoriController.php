<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('pengguna.kategori', compact('kategoris'));
        }

        /**
         * Show the form for creating a new resource.
        */
    public function create(Request $request)
    {
        }

        /**
         * Store a newly created resource in storage.
        */

        public function store(Request $request)
        {
            $validated = $request->validate([
                "kode_kategori" => 'required|string',
                "nama_kategori" => 'required|string'
            ]);
            Kategori::create($validated);
            return redirect()->route('kategori.index');
        }

            /**
             * Display the specified resource.
            */
            public function show(Kategori $kategori): Response
            {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $kategoris = Kategori::all();
        return view('pengguna.kategori', [
            "kategoris" => $kategoris,
            "editKategori" => $kategori
            ]);
    }

            /**
             * Update the specified resource in storage.
            */
            public function update(Request $request, Kategori $kategori)
            {

                $validated = $request->validate([
                    "kode_kategori" => 'required|string',
                    "nama_kategori" => 'required|string'
                ]);
                $kategori->update($validated);
                return redirect()->route('kategori.index');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
