<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Datakos;
use App\Http\Requests\UpdatePemesananRequest;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('user')->get();
        return view('admin.data-pemesanan', compact('pemesanans'));
    }

    public function pesanan()
    {
        // Mendapatkan pemilik kos yang sedang login
        $pemilikKos = Auth::guard('pemilik_kos')->user();
        
        // Mengambil data pemesanan yang terkait dengan pemilik kos tersebut
        $pesananKos = $pemilikKos->pemesanan;

        // Mengirim data ke view pemilik.pesanan.blade.php
        return view('pemilik_kos.data-pemesan', compact('pesananKos'));
    }

    public function pesan($datakos_id)
    {
        $datakos = Datakos::findOrFail($datakos_id);
        return view('pemesanan.pesan', compact('datakos'));
    }


    public function create(Request $request)
    {
        $datakos_id = $request->get('datakos_id');
        $datakos = Datakos::findOrFail($datakos_id);
        return view('pemesanan.pesan', compact('datakos'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi data yang diinput oleh pengguna
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'tipe_kos' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'total_biaya' => 'required|numeric',
        ]);

        // Buat data pemesanan baru dengan data yang sudah divalidasi
        $pemesanan = Pemesanan::create($request->all());
        // dd($pemesanan);

        // Redirect ke route 'card.setuju' dengan membawa data pemesanan
        return redirect()->route('card.pemesanan', $pemesanan->id);
    }


    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        return view('pemesanan.edit', compact('pemesanan'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        // Validasi input dari form
        $request->validate([
            'aksi' => 'required|string|in:Setuju,Tidak setuju,Pending',
        ]);

        // Update field 'aksi' pada model 'Pemesanan'
        $pemesanan->update([
            'aksi' => $request->aksi,
        ]);

        // Redirect ke halaman pemesanan dengan pesan sukses
        return redirect()->route('pemilik.pemesanan');
    }


    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
