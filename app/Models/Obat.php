<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\KategoriObat;

class Obat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama', 'kategori_id', 'tipe', 'dosis', 'harga', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo(KategoriObat::class, 'kategori_id', 'id');
    }
}
