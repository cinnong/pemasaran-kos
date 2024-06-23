<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Datakos;
use App\Http\Requests\UpdatePemesananRequest;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return view('pemesanan.index', compact('pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $datakos_id = $request->get('datakos_id');
            $datakos = \App\Models\Datakos::findOrFail($datakos_id);
        return view('pemesanan.pesan', compact('datakos'));
    }

    public function store(Request $request)
    {
        //untuk nampilin error
        // dd($request->all());
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'tipe_kos' => 'required',
            'harga' => 'required|numeric',
            'total_biaya' => 'required|numeric',
        ]);

        $pemesanan = Pemesanan::create($request->all());

        return redirect()->route('pembayaran.create', ['pemesanan_id' => $pemesanan->id])
        ->with('success', 'Pemesanan berhasil dibuat. Silakan upload bukti pembayaran.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        return view('pemesanans.edit', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananRequest  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'nama_penyewa' => 'required',
            'tanggal_pemesanan' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'tipe_kos' => 'required|in:pria,wanita,campuran',
            'per_bulan' => 'required',
            'harga' => 'required',
            'total_biaya' => 'required',
            'status_pemesanan' => 'required|in:Dipesan,Dikonfirmasi,Dibatalkan,Selesai',
        ]);

        $pemesanan->update($request->all());

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
