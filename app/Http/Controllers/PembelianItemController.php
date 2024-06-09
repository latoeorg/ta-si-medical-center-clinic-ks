<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pembelian;
use App\Models\PembelianItem;
use App\Models\Obat;

class PembelianItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $harga = Obat::find($request->obat_id)->harga;

        $data = $request->all();
        $data['total'] = $harga * $request->quantity;

        PembelianItem::create($data);

        $pembelianItems = PembelianItem::where('pembelian_id', $request->pembelian_id)->get();
        $totalAmount = 0;
        foreach ($pembelianItems as $pembelianItem) {
            $totalAmount += $pembelianItem->total;
        }

        $pembelian = Pembelian::find($request->pembelian_id);
        $pembelian->total_amount = $totalAmount;
        $pembelian->save();

        return redirect()
            ->route('pembelian.show', $request->pembelian_id)
            ->with('success', 'Item pembelian berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pembelianItem = PembelianItem::find($id);

        $harga = Obat::find($request->obat_id)->harga;

        $data = $request->all();
        $data['total'] = $harga * $request->quantity;

        $pembelianItem->update($data);

        $pembelianItems = PembelianItem::where('pembelian_id', $pembelianItem->pembelian_id)->get();
        $totalAmount = 0;
        foreach ($pembelianItems as $pembelianItem) {
            $totalAmount += $pembelianItem->total;
        }

        $pembelian = Pembelian::find($pembelianItem->pembelian_id);
        $pembelian->total_amount = $totalAmount;
        $pembelian->save();

        return redirect()
            ->route('pembelian.show', $pembelianItem->pembelian_id)
            ->with('success', 'Item pembelian berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelianItem = PembelianItem::find($id);
        $pembelianItem->delete();

        $pembelianItems = PembelianItem::where('pembelian_id', $pembelianItem->pembelian_id)->get();
        $totalAmount = 0;
        foreach ($pembelianItems as $pembelianItem) {
            $totalAmount += $pembelianItem->total;
        }

        $pembelian = Pembelian::find($pembelianItem->pembelian_id);
        $pembelian->total_amount = $totalAmount;
        $pembelian->save();

        return redirect()
            ->route('pembelian.show', $pembelianItem->pembelian_id)
            ->with('success', 'Item pembelian berhasil dihapus');
    }
}
