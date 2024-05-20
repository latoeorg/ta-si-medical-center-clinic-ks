<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama', 'alamat', 'no_telp', 'email', 'jenis_kelamin', 'tanggal_lahir', 'pekerjaan', 'agama', 'golongan_darah', 'status_pernikahan'];
}
