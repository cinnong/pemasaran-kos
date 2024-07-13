<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PemilikKos;

class Datakos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'harga',
        'jumlah_kamar',
        'tipekos',
        'deskripsi',
        'notlp',
        'foto',
        'nomor_rekening',
        'pemilik_kos_id',
        'status'
    ];

    public function pemilikkos()
    {
        return $this->belongsTo(PemilikKos::class, 'pemilik_kos_id');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_kos');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_kos');
    }

    
}
