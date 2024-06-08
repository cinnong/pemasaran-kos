<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakos extends Model
{
    use HasFactory;

    protected $table = 'datakos';  
    protected $fillable = [
        'nama',
        'lokasi',
        'harga',
        'status',
        'jumlah_kamar',
        'deskripsi',
        'notlp',
        'foto'
    ];
}
