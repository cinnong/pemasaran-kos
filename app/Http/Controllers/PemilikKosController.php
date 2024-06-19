<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakos;

class PemilikKosController extends Controller
{
    public function dashboard()
    {
        // Mengambil semua data kos beserta data pemiliknya
        $datakos = Datakos::with('datapemilik')->get();

        return view('pemilik_kos.dashboard', compact('datakos'));
    }
}
