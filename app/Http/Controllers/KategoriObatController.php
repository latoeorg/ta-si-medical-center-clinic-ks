<?php

namespace App\Http\Controllers;

use App\Models\KategoriObat;
use Illuminate\Http\Request;

class KategoriObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KategoriObat::all();

        return view('pages.kategori-obat.index', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        KategoriObat::create($data);

        return redirect()->route('kategori-obat.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = KategoriObat::findOrFail($id);
        $item->update($data);

        return redirect()->route('kategori-obat.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = KategoriObat::findOrFail($id);
        $item->delete();

        return redirect()->route('kategori-obat.index')->with('status', 'Data berhasil diubah');
    }
}
