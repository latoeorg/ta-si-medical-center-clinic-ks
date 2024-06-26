<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pasien::all();

        return view('pages.pasien.index', [
            'list_jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'list_agama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
            'list_golongan_darah' => ['A', 'B', 'AB', 'O'],
            'list_status_pernikahan' => ['Belum Menikah', 'Menikah', 'Duda', 'Janda'],

            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Pasien::create($data);

        return redirect()->route('pasien.index')->with('status', 'Data pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->all();

        $pasien->update($data);

        return redirect()->route('pasien.index')->with('status', 'Data pasien berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('status', 'Data pasien berhasil dihapus.');
    }
}
