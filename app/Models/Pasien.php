<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Hubungkan ke nama tabel yang benar di database
    protected $table = 'daftar_pasien';

    protected $fillable = [
        'no_pasien', 
        'nik', 
        'nama_pasien', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'umur', 
        'golongan_darah', 
        'alamat', 
        'no_hp', 
        'pendidikan', 
        'agama', 
        'pekerjaan', 
        'nama_suami'
    ];
}