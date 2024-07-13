<?php

namespace App\Http\Controllers;

use App\Models\Datakos;
use App\Models\PemilikKos;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.data-pengguna', compact('users'));
    }

    public function pemilik()
    {
        $pemilikKos = PemilikKos::all();
        return view('admin.data-pemilik', compact('pemilikKos'));
    }

    public function editKos(Request $request, $id)
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
        return redirect()->route('datakos')->with('success', 'Data kos berhasil diperbarui');
    }

    public function deleteKos($id)
    {
        $datakos = Datakos::findOrFail($id);

        $datakos->delete();

        return redirect()->route('datakos')->with('success', 'Data kos berhasil dihapus');
    }
}
