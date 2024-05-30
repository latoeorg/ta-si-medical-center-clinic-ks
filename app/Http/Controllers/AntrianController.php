<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Antrian;
use App\Models\Pasien;

class AntrianController extends Controller
{
    public function index()
    {
        $items = Antrian::orderBy('nomor_antrian', 'desc')->get();
        $active_antrian = Antrian::where('is_active', true)->first();

        return view('pages.antrian.index', [
            'items' => $items,

            'active_antrian' => $active_antrian ? $active_antrian->nomor_antrian : 0,
            'active_pasien' => $active_antrian ? Pasien::find($active_antrian->pasien_id) : null,

            'last_antrian' => Antrian::latest()->first(),
            'list_pasien' => Pasien::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
        ]);

        $last_antrian = Antrian::latest()->first();

        $antrian = new Antrian();
        $antrian->pasien_id = $request->pasien_id;
        $antrian->nomor_antrian = $last_antrian ? $last_antrian->nomor_antrian + 1 : 1;
        $antrian->save();

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil ditambahkan');
    }

    public function next(Request $request)
    {
        $active_antrian = Antrian::where('is_active', true)->first();
        $active_antrian = $active_antrian ? $active_antrian->nomor_antrian : '0';

        $next_antrian = Antrian::where('nomor_antrian', $active_antrian + 1)->first();

        if ($next_antrian) {
            // set all antrian to inactive
            Antrian::where('is_active', true)->update(['is_active' => false]);

            $next_antrian->is_active = true;
            $next_antrian->save();
        }

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dipanggil');
    }

    public function reset(Antrian $antrian)
    {
        Antrian::truncate();

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil direset');
    }

    /**
     * Display the specified resource.
     */
    public function show(Antrian $antrian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antrian $antrian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        // update next antrian
        $active_antrian = Antrian::where('is_active', true)->first();
        $active_antrian = $active_antrian ? $active_antrian->nomor_antrian : '0';

        $next_antrian = Antrian::where('nomor_antrian', $active_antrian + 1)->first();

        if ($next_antrian) {
            // set all antrian to inactive
            Antrian::where('is_active', true)->update(['is_active' => false]);

            $next_antrian->is_active = true;
            $next_antrian->save();
        }

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dipanggil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antrian $antrian)
    {
        //
    }
}
