<?php

namespace App\Http\Controllers;

use App\Models\Datakos;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pemesanan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('pembayaran.data-pembayaran', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pemesanan_id)
    {
        // Mencari pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);

        // Menampilkan view upload-bukti dengan data pemesanan
        return view('pemesanan.upload-bukti', compact('pemesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Memproses dan menyimpan data pembayaran
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'pemesanan_id' => 'required',
            'upload_bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('upload_bukti_pembayaran');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('photos/bukti'), $imageName);

        // Membuat entri pembayaran baru
        Pembayaran::create([
            'pemesanan_id' => $request->pemesanan_id,
            'tanggal_pembayaran' => now(),
            'upload_bukti_pembayaran' => $imageName,
            'status_pembayaran' => 'pending',
        ]);

        // Mengurangi jumlah kamar pada datakos
        $pemesanan = Pemesanan::find($request->pemesanan_id); // Asumsi pemesanan_id mengacu ke Pemesanan
        $datakos = Datakos::find($pemesanan->id_kos); // Asumsi pemesanan memiliki datakos_id

        // dd($pemesanan, $datakos);

        if ($datakos) {
            $datakos->jumlah_kamar -= 1; // Kurangi jumlah kamar
            $datakos->save(); // Simpan perubahan
        }

        // Redirect ke halaman pemesanan dengan pesan sukses
        return redirect()->route('card.welcome')->with('success', 'Bukti pembayaran berhasil diupload. Silakan menunggu konfirmasi.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('pembayarans.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayarans.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'upload_bukti_pembayaran' => 'sometimes|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_pembayaran' => 'required|in:pending,berhasil,gagal',
        ]);

        // Handle file upload if new file provided
        if ($request->hasFile('upload_bukti_pembayaran')) {
            $file = $request->file('upload_bukti_pembayaran');
            $path = $file->store('bukti_pembayaran', 'public');
            $pembayaran->upload_bukti_pembayaran = $path;
        }

        // Update Pembayaran
        $pembayaran->pemesanan_id = $request->input('pemesanan_id');
        $pembayaran->status_pembayaran = $request->input('status_pembayaran');
        $pembayaran->save();

        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
