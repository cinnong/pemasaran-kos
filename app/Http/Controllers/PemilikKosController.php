<?php

namespace App\Http\Controllers;

use App\Models\Datakos;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\PemilikKos;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class PemilikKosController extends Controller
{
    public function index()
    {
        $pemilikKos = PemilikKos::all();
        return view('pemilik_kos.data-pemilik', compact('pemilikKos'));
    }

    public function datakospemilik()
    {
        $pemilikKos = Auth::guard('pemilik_kos')->user();
        $dataKos = Datakos::where('pemilik_kos_id', $pemilikKos->id)->get();

        return view('pemilik_kos.data-kos', compact('dataKos'));
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
            'email' => 'required|email|unique:pemilik_kos,email,' . $id,
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

    public function pemesan()
    {
        $pemilikKos = Auth::guard('pemilik_kos')->user();
        $pembayaran = Pembayaran::with(['pemesanan.user'])
            ->whereHas('pemesanan', function ($query) use ($pemilikKos) {
                $query->where('pemilik_kos_id', $pemilikKos->id);
            })
            ->get();

        // Mengirim data ke view pemilik.pesanan.blade.php
        return view('pemilik_kos.data-user', compact('pembayaran'));
    }

    public function pembayaran()
    {
        // Mendapatkan pemilik kos yang sedang login
        $pemilikKos = Auth::guard('pemilik_kos')->user();

        // Mengambil data pemesanan yang terkait dengan pemilik kos tersebut
        $dataPembayaran = $pemilikKos->pemesanan()
            ->with(['pembayaran', 'user'])
            ->get()
            ->pluck('pembayaran')
            ->flatten();

        // Mengirim data ke view pemilik.pembayaran.blade.php
        return view('pemilik_kos.data-pembayaran', compact('dataPembayaran'));
    }
}
