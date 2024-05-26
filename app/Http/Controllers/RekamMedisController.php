<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RekamMedis;
use App\Models\RekamMedisObat;
use App\Models\Obat;
use App\Models\Pasien;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = RekamMedis::all();

        $list_pasien = Pasien::all();

        return view('pages.rekam-medis.index', [
            'items' => $items,

            'list_pasien' => $list_pasien,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'DRAFT';

        $result = RekamMedis::create($data);

        return redirect()->route('rekam-medis.show', $result->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $items = RekamMedisObat::where('rekam_medis_id', $id)->get();

        $list_obat = Obat::all();
        $list_pasien = Pasien::all();

        return view('pages.rekam-medis.obat.index', [
            'rekamMedis' => $rekamMedis,
            'items' => $items,

            'list_obat' => $list_obat,
            'list_pasien' => $list_pasien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->update($data);

        return redirect()->route('rekam-medis.show', $id)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rekamMedisObat = RekamMedisObat::where('rekam_medis_id', $id)->get();
        foreach ($rekamMedisObat as $item) {
            $item->delete();
        }

        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->delete();

        return redirect()->route('rekam-medis.index')->with('success', 'Data berhasil dihapus');
    }
}
