<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datakos;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil input pencarian dari request pengguna
        $query = $request->input('query');
        $results = datakos::where('nama', 'like', '%' . $query . '%') //cari di kolom 'nama'
            ->orWhere('lokasi', 'like', '%' . $query . '%')          // cari di kolom 'lokasi'
            ->orWhere('harga', 'like', '%' . $query . '%')           // cari di kolom 'harga'
            ->get();                                                 // gambil semua hasil pencarian

        // Mengembalikan view 'search.results' dengan data hasil pencarian dan query
        return view('search.results', compact('results', 'query'));
    }
}
