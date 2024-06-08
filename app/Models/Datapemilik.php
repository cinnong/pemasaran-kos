<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapemilik extends Model
{
    use HasFactory;

    protected $table = 'datapemilik';

    protected $fillable = [
        'nama',
        'alamat',
        'notlp',
        'email',
    ];

    public $timestamps = false;
}
