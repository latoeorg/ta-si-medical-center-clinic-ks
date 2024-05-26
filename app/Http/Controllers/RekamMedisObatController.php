<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RekamMedis;
use App\Models\RekamMedisObat;
use App\Models\Obat;

class RekamMedisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obat = Obat::find($request->obat_id);

        $data = $request->all();
        $data['harga'] = $obat->harga;
        $data['total_harga'] = $obat->harga * $request->jumlah;

        RekamMedisObat::create($data);

        // looping all obat in rekam medis
        $items = RekamMedisObat::where('rekam_medis_id', $request->rekam_medis_id)->get();
        $total = 0;
        foreach ($items as $item) {
            $total += $item->total_harga;
        }

        $rekamMedis = RekamMedis::find($request->rekam_medis_id);
        $rekamMedis->total_harga = $total;
        $rekamMedis->save();

        return redirect()->back()->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RekamMedisObat $rekamMedisObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedisObat $rekamMedisObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedisObat $rekamMedisObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedisObat $rekamMedisObat)
    {
        //
    }
}
