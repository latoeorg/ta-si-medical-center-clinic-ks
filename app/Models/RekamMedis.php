<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Pasien;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'doctor_id', 'tanggal', 'keluhan', 'diagnosis', 'keterangan', 'status'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}