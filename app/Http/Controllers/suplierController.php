<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;

class suplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = suplier::where('nama_suplier', 'LIKE', '%' . $search . '%')
        ->orWhere('telp', 'LIKE', '%' . $search . '%')
        ->paginate();

        return view('Suplier.suplier', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Suplier.add-suplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'tgl_terdaftar' => 'required',
            'status' => 'required',
        ], [
            'nama_suplier.required' => 'Data Wajib diisi',
            'email.required' => 'Data Wajib diisi',
            'alamat.required' => 'Data Wajib diisi',

            'telp.required' => 'Data Wajib diisi',
            'telp.numeric' => 'Data berupa angka',

            'tgl_terdaftar.required' => 'Data Wajib diisi',
            'status.required' => 'Data Wajib diisi',
        ]);

        $saveSuplier = new suplier();
        $saveSuplier->nama_suplier = $request->nama_suplier;
        $saveSuplier->email = $request->email;
        $saveSuplier->alamat = $request->alamat;
        $saveSuplier->telp = $request->telp;
        $saveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $saveSuplier->status = $request->status;
        $saveSuplier->save();

        return redirect('/suplier')->with(
            'message',
            'Data ' . $request->nama_suplier . ' Berhasil ditambahkan'
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
        $ikanHiu = suplier::find($id);
        // dd($getData);
        return view('Suplier.edit-suplier', compact(
            'ikanHiu'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'tgl_terdaftar' => 'required',
            'status' => 'required',
        ], [
            'nama_suplier.required' => 'Data Wajib diisi',
            'email.required' => 'Data Wajib diisi',
            'alamat.required' => 'Data Wajib diisi',

            'telp.required' => 'Data Wajib diisi',
            'telp.numeric' => 'Data berupa angka',

            'tgl_terdaftar.required' => 'Data Wajib diisi',
            'status.required' => 'Data Wajib diisi',
        ]);

        $saveSuplier = suplier::find($id);
        $saveSuplier->nama_suplier = $request->nama_suplier;
        $saveSuplier->email = $request->email;
        $saveSuplier->alamat = $request->alamat;
        $saveSuplier->telp = $request->telp;
        $saveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $saveSuplier->status = $request->status;
        $saveSuplier->save();

        return redirect('/suplier')->with(
            'message',
            'Data ' . $request->nama_suplier . ' Berhasil diperbaharui!!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getData = suplier::find($id);
        $getData->delete();

        return redirect('/suplier')->with(
            'message',
            'Data ' . $getData->nama_suplier . ' Berhasil dihapus!!'
        );
    }
}
