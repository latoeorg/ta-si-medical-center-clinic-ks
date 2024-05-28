<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'total_pendapatan' => RekamMedis::sum('total_harga'),

            'total_obat' => Obat::count(),
            'total_pasien' => Pasien::count(),
            'total_rekam_medis' => RekamMedis::count(),
            'total_user' => User::count(),

            'riwayat' => RekamMedis::all(),
        ]);
    }
}
