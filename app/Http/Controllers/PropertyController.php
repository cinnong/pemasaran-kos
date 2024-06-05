<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Properties::all();
        return view('properties.table', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
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

        Properties::create($input);

        return redirect()->route('dashboard')->with('success', 'Property created successfully!');
    }

    public function edit($id)
    {
        $property = Properties::findOrFail($id);
        return view('properties.edit', compact('property'));
    }

    public function show($id)
    {
        $property = Properties::findOrFail($id);
        return view('properties.show', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Properties::findOrFail($id);

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

        $property->nama = $request->nama;
        $property->lokasi = $request->lokasi;
        $property->harga = $request->harga;
        $property->jumlah_kamar = $request->jumlah_kamar;
        $property->status = $request->status;
        $property->deskripsi = $request->deskripsi;
        $property->notlp = $request->notlp;

        if ($request->hasFile('foto')) {
            if ($property->foto) {
                unlink(public_path('photos/' . $property->foto));
            }

            $gambar = $request->file('foto');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('photos'), $namaFile);
            $property->foto = $namaFile;
        }

        $property->save();

        return redirect()->route('dashboard')->with('success', 'Property updated successfully!');
    }

    public function destroy($id)
    {
        $property = Properties::findOrFail($id);

        if ($property->foto) {
            unlink(public_path('photos/' . $property->foto));
        }

        $property->delete();

        return redirect()->route('dashboard')->with('success', 'Property deleted successfully!');
    }
}
