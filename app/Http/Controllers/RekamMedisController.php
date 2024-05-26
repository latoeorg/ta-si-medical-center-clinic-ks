<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

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
        $result = RekamMedis::create($request->all());

        return redirect()->route('rekam-medis.edit', $result->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);

        $list_pasien = Pasien::all();

        return view('pages.rekam-medis.update', [
            'rekamMedis' => $rekamMedis,

            'list_pasien' => $list_pasien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
