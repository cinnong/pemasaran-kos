<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PemilikKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PemilikKosRegisterController extends Controller
{
    public function create()
    {
        return view('auth.pemilik_kos-register');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $pemilikKos = $this->createPemilikKos($request->all());

        // Login otomatis setelah registrasi
        auth()->guard('pemilik_kos')->login($pemilikKos);

        return redirect('/'); // Mengarahkan kembali ke halaman utama setelah registrasi berhasil
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pemilik_kos'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function createPemilikKos(array $data)
    {
        return PemilikKos::create([
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
