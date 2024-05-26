<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RekamMedis;
use App\Models\RekamMedisObat;
use App\Models\Obat;

class RekamMedisObatController extends Controller
{
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $obat = Obat::find($request->obat_id);

        $data = $request->all();
        $data['harga'] = $obat->harga;
        $data['total_harga'] = $obat->harga * $request->jumlah;

        $rekamMedisObat = RekamMedisObat::find($id);
        $rekamMedisObat->update($data);

        // looping all obat in rekam medis
        $items = RekamMedisObat::where('rekam_medis_id', $request->rekam_medis_id)->get();
        $total = 0;
        foreach ($items as $item) {
            $total += $item->total_harga;
        }

        $rekamMedis = RekamMedis::find($request->rekam_medis_id);
        $rekamMedis->total_harga = $total;
        $rekamMedis->save();

        return redirect()->back()->with('success', 'Obat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rekamMedisObat = RekamMedisObat::find($id);
        $rekamMedisObat->delete();

        // looping all obat in rekam medis
        $items = RekamMedisObat::where('rekam_medis_id', $rekamMedisObat->rekam_medis_id)->get();
        $total = 0;
        foreach ($items as $item) {
            $total += $item->total_harga;
        }

        $rekamMedis = RekamMedis::find($rekamMedisObat->rekam_medis_id);
        $rekamMedis->total_harga = $total;
        $rekamMedis->save();

        return redirect()->back()->with('success', 'Obat berhasil dihapus');
    }
}
