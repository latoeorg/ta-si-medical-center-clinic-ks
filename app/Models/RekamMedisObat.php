<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RekamMedis;
use App\Models\Obat;

class RekamMedisObat extends Model
{
    use HasFactory;

    protected $fillable = ['rekam_medis_id', 'obat_id', 'jumlah', 'aturan_pakai', 'keterangan'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'rekam_medis_id', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}
