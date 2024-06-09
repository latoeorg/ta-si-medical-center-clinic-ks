<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Obat;
use App\Models\ObatHistory;
use App\Models\Pembelian;
use App\Models\PembelianItem;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pembelian::all();

        return view('pages.pembelian.index', [
            'items' => $items,
        ]);
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
        $data = $request->all();

        $result = Pembelian::create($data);

        return redirect()->route('pembelian.show', $result->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list_obat = Obat::all();

        $pembelian = Pembelian::find($id);
        $items = PembelianItem::where('pembelian_id', $id)->get();

        return view('pages.pembelian.item.index', [
            'list_obat' => $list_obat,

            'pembelian' => $pembelian,
            'items' => $items,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->update($request->all());

        if ($request->status == 'DONE') {
            $pembelianItems = PembelianItem::where('pembelian_id', $id)->get();
            foreach ($pembelianItems as $i) {
                $obat = Obat::find($i->obat_id);

                ObatHistory::create([
                    'obat_id' => $i->obat_id,
                    'user_id' => auth()->user()->id,
                    'stok_sebelum' => $obat->stok,
                    'stok' => $i->quantity,
                    'stok_setelah' => $obat->stok + $i->quantity,
                    'description' => 'Obat masuk dari Pembelian #00' . $id,
                    'tipe' => 'PEMBELIAN',
                ]);

                $obat->stok += $i->quantity;
                $obat->save();
            }
        }

        return redirect()
            ->route('pembelian.show', $pembelian->id)
            ->with('success', 'Berhasil Edit Pembelian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Berhasil Hapus Pembelian.');
    }
}
