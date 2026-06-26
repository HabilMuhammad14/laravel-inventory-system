<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pengguna.supplier', compact('suppliers'));
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
            "id_supplier" => 'required|unique:suppliers|nullable',
            'nama_supplier' => 'required|string|nullable',
            'alamat' => 'required',
            'no_telepon' => 'required|nullable'
        ]);
        Supplier::create($validated);
        return redirect()->route('supplier.index');
        }

        /**
         * Display the specified resource.
        */
        public function show(Supplier $supplier): Response
        {
            //
            }

            /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $suppliers = Supplier::all();
        return view('pengguna.supplier', ['suppliers' => $suppliers, 'editSupplier' => $supplier]);
        }

        /**
         * Update the specified resource in storage.
        */
        public function update(Request $request, Supplier $supplier)
        {
            $validated = $request->validate([
                "id_supplier" => 'required|nullable',
                'nama_supplier' => 'required|string|nullable',
                'alamat' => 'required',
                'no_telepon' => 'required|nullable'
            ]);
            $supplier->update($validated);
            return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
