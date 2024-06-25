<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Datakos;
use App\Http\Requests\UpdatePemesananRequest;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return view('pemesanan.data-pemesanan', compact('pemesanans'));
    }

    public function create(Request $request)
    {
        $datakos_id = $request->get('datakos_id');
        $datakos = Datakos::findOrFail($datakos_id);
        return view('pemesanan.pesan', compact('datakos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'tipe_kos' => 'required',
            'harga' => 'required|numeric',
            'total_biaya' => 'required|numeric',
        ]);

        $pemesanan = Pemesanan::create($request->all());

        return redirect()->route('card.nunggu');
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        return view('pemesanan.edit', compact('pemesanan'));
    }

    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'aksi' => 'required|in:Setuju,Tidak setuju',
            'nama_penyewa' => 'required',
            'tanggal_pemesanan' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'tipe_kos' => 'required|in:pria,wanita,campuran',
            'per_bulan' => 'required',
            'harga' => 'required',
            'total_biaya' => 'required',
            'aksi' => 'required|string',
        ]);

        $pemesanan->update($request->all());([
            'aksi' => $request->aksi,
        ]);

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
