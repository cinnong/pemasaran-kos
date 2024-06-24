<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakos;
use App\Models\PemilikKos;
use Illuminate\Support\Facades\Storage;

class DatakosController extends Controller
{
    public function index()
    {
        $datakos = Datakos::with('pemilikkos')->get();
        return view('datakos.table-kos', compact('datakos'));
    }

    public function create()
    {
        $pemilik_kos = PemilikKos::all();
        return view('datakos.create', compact('pemilik_kos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'tipekos' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pemilik_kos_id' => 'required|exists:pemilik_kos,id'
        ]);

        $dataKos = new Datakos;
        $dataKos->nama = $validated['nama'];
        $dataKos->lokasi = $validated['lokasi'];
        $dataKos->harga = $validated['harga'];
        $dataKos->jumlah_kamar = $validated['jumlah_kamar'];
        $dataKos->tipekos = $validated['tipekos'];
        $dataKos->deskripsi = $validated['deskripsi'];
        $dataKos->notlp = PemilikKos::findOrFail($validated['pemilik_kos_id'])->no_hp;
        $dataKos->pemilik_kos_id = $validated['pemilik_kos_id'];

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/photos');
            // Ubah path agar sesuai dengan yang bisa diakses publik
            $dataKos->foto = str_replace('public/', '', $path);
        }

        $dataKos->save();

        return redirect()->route('beranda-admin')->with('success', 'Data kos berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $datakos = Datakos::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'tipekos' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pemilik_kos_id' => 'required|exists:pemilik_kos,id'
        ]);

        $datakos->nama = $validated['nama'];
        $datakos->lokasi = $validated['lokasi'];
        $datakos->harga = $validated['harga'];
        $datakos->jumlah_kamar = $validated['jumlah_kamar'];
        $datakos->tipekos = $validated['tipekos'];
        $datakos->deskripsi = $validated['deskripsi'];
        $datakos->notlp = PemilikKos::findOrFail($validated['pemilik_kos_id'])->no_hp;
        $datakos->pemilik_kos_id = $validated['pemilik_kos_id'];

        if ($request->hasFile('foto')) {
            if ($datakos->foto && Storage::exists('public/' . $datakos->foto)) {
                Storage::delete('public/' . $datakos->foto);
            }
            $path = $request->file('foto')->store('public/photos');
            $datakos->foto = str_replace('public/', '', $path);
        }

        $datakos->save();

        return redirect()->route('beranda-admin')->with('success', 'Data kos berhasil diperbarui');
    }

    public function edit($id)
    {
        $datakos = Datakos::findOrFail($id);
        $pemilikKos = PemilikKos::all();
        return view('datakos.edit', compact('datakos', 'pemilikKos'));
    }

    public function show($id)
    {
        $datakos = Datakos::with('pemilikkos')->findOrFail($id);
        return view('datakos.show', compact('datakos'));
    }

    public function destroy($id)
    {
        $datakos = Datakos::findOrFail($id);

        if ($datakos->foto && Storage::exists('public/' . $datakos->foto)) {
            Storage::delete('public/' . $datakos->foto);
        }

        $datakos->delete();

        return redirect()->route('beranda-admin')->with('success', 'Data kos berhasil dihapus');
    }
}
