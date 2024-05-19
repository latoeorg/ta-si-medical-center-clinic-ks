<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_tipe = ['Obat Bebas Terbatas', 'Obat Bebas', 'Obat Keras (K)', 'Obat Keras (N)', 'Obat Psikotropika', 'Obat Narkotika', 'Obat Herbal', 'Obat Tradisional'];
        $items = JenisObat::all();

        return view('pages.jenis-obat.index', [
            'list_tipe' => $list_tipe,

            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        JenisObat::create($data);

        return redirect()->route('jenis-obat.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisObat $jenisObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = JenisObat::findOrFail($id);
        $item->update($data);

        return redirect()->route('jenis-obat.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = JenisObat::findOrFail($id);
        $item->delete();

        return redirect()->route('jenis-obat.index')->with('success', 'Data berhasil dihapus');
    }
}
