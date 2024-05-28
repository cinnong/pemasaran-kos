<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'lokasi', 'harga', 'status', 'jumlah_kamar', 'fasilitas_yang_tersedia', 'deskripsi', 'informasi_kontak', '_token'
    ];
}
