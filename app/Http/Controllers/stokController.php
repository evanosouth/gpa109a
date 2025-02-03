<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Models\suplier;
use Illuminate\Http\Request;

class stokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Stok.stok');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $getSuplier = suplier::all();
        return view('Stok.add-stok', compact(
            'getSuplier'
        ));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'suplier_id' => 'required',
            'cabang' => 'required',
        ]);

        $saveStok = new stok();
        $saveStok->kode_barang = $request->kode_barang;
        $saveStok->nama_barang = $request->nama_barang;
        $saveStok->harga = $request->harga;
        $saveStok->stok = $request->stok;
        $saveStok->suplier_id = $request->suplier_id;
        $saveStok->cabang = $request->cabang;

        dd($saveStok);
        return redirect('/stok')->with(
            'message',
            'Stok ' . $request->nama_barang . ' ditambahkan!'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
