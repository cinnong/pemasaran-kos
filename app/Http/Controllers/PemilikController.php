<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikKos;

class PemilikKosController extends Controller
{
    public function index()
    {
        $pemilikKos = PemilikKos::all();
        return view('pemilik_kos.data-pemilik', compact('pemilikKos'));
    }

    public function edit($id)
    {
        $pemilikKos = PemilikKos::findOrFail($id);
        return view('pemilik_kos.edit-pemilik', compact('pemilikKos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|unique:pemilik_kos,email,'.$id,
        ]);

        $pemilikKos = PemilikKos::findOrFail($id);

        $pemilikKos->nama = $request->input('nama');
        $pemilikKos->no_hp = $request->input('no_hp');
        $pemilikKos->email = $request->input('email');

        $pemilikKos->save();

        return redirect()->route('pemilik_kos.index')->with('success', 'Data Pemilik Kos berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pemilikKos = PemilikKos::findOrFail($id);
        $pemilikKos->delete();
        return redirect()->route('pemilik_kos.index')->with('success', 'Pemilik Kos berhasil dihapus.');
    }
}
