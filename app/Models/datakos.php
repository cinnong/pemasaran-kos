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
        'tipekos',
        'deskripsi',
        'notlp',
        'foto',
        'datapemilik_id',
    ];

    public function datapemilik()
    {
        return $this->belongsTo(PemilikKos::class, 'datapemilik_id');
    }

    public function pemilik()
    {
    return $this->belongsTo(PemilikKos::class, 'pemilik_kos_id');
    }
}
