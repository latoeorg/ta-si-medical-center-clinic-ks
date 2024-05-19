<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\JenisObat;

class Obat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama', 'jenis_obat_id', 'tipe', 'dosis', 'keterangan'];

    public function jenisObat()
    {
        return $this->belongsTo(JenisObat::class);
    }
}
