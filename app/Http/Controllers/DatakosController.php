<?php

namespace App\Http\Controllers;

use App\Models\datakos;
use Illuminate\Http\Request;

class DatakosController extends Controller
{
    public function index()
    {
        $datakos = Datakos::all();
        return view('datakos.table', compact('datakos'));
    }

    public function create()
    {
        return view('datakos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'status' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'notlp' => 'required|string|max:15',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('photos'), $namaFile);
            $input['foto'] = $namaFile;
        }

        Datakos::create($input);

        return redirect()->route('input')->with('success', 'Datakos created successfully!');
    }

    public function edit($id)
    {
        $datakos = Datakos::findOrFail($id);
        return view('datakos.edit', compact('datakos'));
    }

    public function show($id)
    {
        $datakos = Datakos::findOrFail($id);
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
            'status' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'notlp' => 'required|string|max:15',
        ]);

        $datakos->nama = $request->nama;
        $datakos->lokasi = $request->lokasi;
        $datakos->harga = $request->harga;
        $datakos->jumlah_kamar = $request->jumlah_kamar;
        $datakos->status = $request->status;
        $datakos->deskripsi = $request->deskripsi;
        $datakos->notlp = $request->notlp;

        if ($request->hasFile('foto')) {
            if ($datakos->foto) {
                unlink(public_path('photos/' . $datakos->foto));
            }

            $gambar = $request->file('foto');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('photos'), $namaFile);
            $datakos->foto = $namaFile;
        }

        $datakos->save();

        return redirect()->route('input')->with('success', 'Datakos updated successfully!');
    }

    public function destroy($id)
    {
        $datakos = Datakos::findOrFail($id);

        if ($datakos->foto) {
            unlink(public_path('photos/' . $datakos->foto));
        }

        $datakos->delete();

        return redirect()->route('input')->with('success', 'Datakos deleted successfully!');
    }
}
