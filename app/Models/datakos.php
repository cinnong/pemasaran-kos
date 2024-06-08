<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datapemilik;

class Datakos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'harga',
        'jumlah_kamar',
        'status',
        'deskripsi',
        'notlp',
        'foto',
        'datapemilik_id', // Tambahkan kolom datapemilik_id ke dalam $fillable
    ];

    public function datapemilik()
    {
        return $this->belongsTo(Datapemilik::class);
    }
}