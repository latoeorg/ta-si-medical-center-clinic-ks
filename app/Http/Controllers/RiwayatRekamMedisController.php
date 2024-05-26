<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RekamMedis;

class RiwayatRekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = RekamMedis::where('status', 'DONE')->get();

        return view('pages.riwayat-rekam-medis.index', [
            'items' => $items,
        ]);
    }
}
