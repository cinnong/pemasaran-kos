<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakos;
use App\Models\PemilikKos;
use Illuminate\Support\Facades\Auth;
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
        // Validasi data yang diinput oleh pengguna
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'tipekos' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'nomor_rekening' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dataKos = new Datakos;
        $dataKos->nama = $validated['nama'];
        $dataKos->lokasi = $validated['lokasi'];
        $dataKos->harga = $validated['harga'];
        $dataKos->jumlah_kamar = $validated['jumlah_kamar'];
        $dataKos->tipekos = $validated['tipekos'];
        $dataKos->deskripsi = $validated['deskripsi'];
        $dataKos->nomor_rekening = $validated['nomor_rekening'];
        $dataKos->notlp = PemilikKos::findOrFail(Auth::guard('pemilik_kos')->user()->id)->no_hp;
        $dataKos->pemilik_kos_id = Auth::guard('pemilik_kos')->user()->id;
        $dataKos->status = 'pending';

        // Proses upload dan penyimpanan foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos/kos'), $imageName);
            $dataKos->foto = $imageName; // Simpan path foto di database
        }

        // Simpan data kos ke dalam database
        $dataKos->save();

        // Redirect ke route beranda-admin dengan pesan sukses
        return redirect()->route('pemilik.datakos')->with('success', 'Data kos berhasil ditambahkan');
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data kos dengan data yang telah divalidasi
        $datakos->nama = $validated['nama'];
        $datakos->lokasi = $validated['lokasi'];
        $datakos->harga = $validated['harga'];
        $datakos->jumlah_kamar = $validated['jumlah_kamar'];
        $datakos->tipekos = $validated['tipekos'];
        $datakos->deskripsi = $validated['deskripsi'];
        $datakos->notlp = PemilikKos::findOrFail(Auth::guard('pemilik_kos')->user()->id)->no_hp;

        // Proses upload dan penggantian foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($datakos->foto && file_exists(public_path('photos/kos/' . $datakos->foto))) {
                unlink(public_path('photos/kos/' . $datakos->foto));
            }

            // Unggah foto baru
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos/kos'), $imageName);

            // Update path foto di database
            $datakos->foto = $imageName;
        }

        // Simpan perubahan data kos ke dalam database
        $datakos->save();

        // Redirect ke route beranda-admin dengan pesan sukses
        return redirect()->route('pemilik.datakos')->with('success', 'Data kos berhasil diperbarui');
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

        $datakos->delete();

        return redirect()->route('pemilik.datakos')->with('success', 'Data kos berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Datakos::query() // Ganti dengan model yang sesuai
            ->where('nama', 'like', "%{$query}%") // Ganti 'name' dengan field yang sesuai
            ->orWhere('lokasi', 'like', "%{$query}%") // Ganti 'location' dengan field yang sesuai
            ->orWhere('harga', 'like', "%{$query}%") // Ganti 'price' dengan field yang sesuai
            ->get();

        return view('datakos.search', compact('results'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Setuju,Tidak setuju',
        ]);

        $kos = Datakos::findOrFail($id);
        $kos->status = $request->status;
        $kos->save();

        return redirect()->route('datakos')->with('status', 'Status kos berhasil diperbarui.');
    }
}
