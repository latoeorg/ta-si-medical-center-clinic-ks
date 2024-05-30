<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pasien;

class Antrian extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pasien_id', 'nomor_antrian'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
