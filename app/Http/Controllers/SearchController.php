<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datakos;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Logika pencarian
        $results = datakos::where('nama', 'like', '%' . $query . '%')
            ->orWhere('lokasi', 'like', '%' . $query . '%')
            ->orWhere('harga', 'like', '%' . $query . '%')
            ->get();

        return view('search.results', compact('results', 'query'));
    }
}
