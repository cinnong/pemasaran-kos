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
            'nama' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer', // Added validation for jumlah_kamar
            'status' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = new Properties();
        $input->nama = $request->nama;
        $input->lokasi = $request->lokasi;
        $input->harga = $request->harga;
        $input->jumlah_kamar = $request->jumlah_kamar; // Added jumlah_kamar
        $input->status = $request->status;
        $input->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('photos'), $namaFile);
            $input->foto = $namaFile;
        }

        $input->save();

        return redirect()->route('dashboard')->with('success', 'Property created successfully!');
    }

    public function edit($id)
    {
        $property = Properties::find($id);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Properties::find($id);

        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric',
            'jumlah_kamar' => 'required|integer', // Added validation for jumlah_kamar
            'status' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $property->nama = $request->nama;
        $property->lokasi = $request->lokasi;
        $property->harga = $request->harga;
        $property->jumlah_kamar = $request->jumlah_kamar; // Added jumlah_kamar
        $property->status = $request->status;
        $property->deskripsi = $request->deskripsi;

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
        $property = Properties::find($id);

        if ($property->foto) {
            unlink(public_path('photos/' . $property->foto));
        }

        $property->delete();

        return redirect()->route('dashboard')->with('success', 'Property deleted successfully!');
    }
}
