<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Sesuaikan dengan model User yang Anda gunakan
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterPemilikController extends Controller
{
    // Tampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('pemilik_kos.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data user ke dalam database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login user secara otomatis setelah registrasi
        auth()->login($user);

        // Redirect ke halaman setelah berhasil registrasi
        return redirect('/'); // Ganti sesuai dengan URL yang diinginkan
    }
}
