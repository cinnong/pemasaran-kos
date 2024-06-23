<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapemili;
use App\Models\Datakos;
use App\Models\PemilikKos;

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
        $pemilik_kos = PemilikKos::all();
        return view('datakos.create', compact('pemilik_kos'));
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

    // Mengambil semua input dari form
    $input = $request->all();

    // Upload gambar jika ada
    if ($request->hasFile('foto')) {
        $gambar = $request->file('foto');
        $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('photos'), $namaFile);
        $input['foto'] = $namaFile;
    }

    // Menyimpan data menggunakan metode create dari model Datakos
    Datakos::create($input);

    // Redirect ke halaman beranda admin dengan pesan sukses
    return redirect()->route('beranda-admin')->with('success', 'Data kos berhasil ditambahkan.');
}


    public function edit($id)
    {
        $datakos = Datakos::findOrFail($id);
        $pemilikKos = PemilikKos::all();
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
