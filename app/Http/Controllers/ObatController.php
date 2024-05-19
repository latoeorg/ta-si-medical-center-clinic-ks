<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\KategoriObat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Obat::all();

        $list_kategori = KategoriObat::all();
        $list_tipe = ['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Obat Tetes', 'Injeksi'];

        return view('pages.obat.index', [
            'items' => $items,

            'list_kategori' => $list_kategori,
            'list_tipe' => $list_tipe,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Obat::create($data);

        return redirect()->route('obat.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Obat::findOrFail($id);
        $item->update($data);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Obat::findOrFail($id);
        $item->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
