<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapemilik;
use App\Models\Datakos;

class DatakosController extends Controller
{
    public function index()
    {
        $datakos = Datakos::with('datapemilik')->get();
        return view('datakos.table-kos', compact('datakos'));
    }

    public function searchByLocation(Request $request)
{
    $locationQuery = $request->input('location_query');

    // Query untuk mencari data kosan berdasarkan lokasi
    $datakos = Datakos::where('lokasi', 'like', '%' . $locationQuery . '%')->get();

    return view('datakos.search-by-location', compact('datakos', 'locationQuery'));
}


    public function create()
    {
        $datapemilik = Datapemilik::all();
        return view('datakos.create', compact('datapemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'tipekos' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'notlp' => 'required|string|max:15',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'datapemilik_id' => 'required|exists:datapemilik,id'
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('photos'), $namaFile);
            $input['foto'] = $namaFile;
        }

        Datakos::create($input);

        return redirect()->route('beranda-admin')->with('success', 'Data kos created successfully!');
    }

    public function edit($id)
    {
        $datakos = Datakos::findOrFail($id);
        $datapemilik = Datapemilik::all();
        return view('datakos.edit', compact('datakos', 'datapemilik'));
    }

    public function show($id)
    {
        $datakos = Datakos::with('datapemilik')->findOrFail($id);
        return view('datakos.show', compact('datakos'));
    }

    public function update(Request $request, $id)
    {
        $datakos = Datakos::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'tipekos' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'notlp' => 'required|string|max:15',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'datapemilik_id' => 'required|exists:datapemilik,id'
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($datakos->foto && file_exists(public_path('photos/' . $datakos->foto))) {
                unlink(public_path('photos/' . $datakos->foto));
            }

            $gambar = $request->file('foto');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('photos'), $namaFile);
            $input['foto'] = $namaFile;
        } else {
            // Pertahankan foto lama jika tidak ada foto baru yang diunggah
            $input['foto'] = $datakos->foto;
        }

        $datakos->update($input);

        return redirect()->route('beranda-admin')->with('success', 'Data kos updated successfully!');
    }

    public function destroy($id)
    {
        $datakos = Datakos::findOrFail($id);

        if ($datakos->foto && file_exists(public_path('photos/' . $datakos->foto))) {
            unlink(public_path('photos/' . $datakos->foto));
        }

        $datakos->delete();

        return redirect()->route('beranda-admin')->with('success', 'Data kos deleted successfully!');
    }
}
