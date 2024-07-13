<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PemilikKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikKosAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pemilik_kos_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('pemilik_kos')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->route('pemilik.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('pemilik_kos')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function destroy($id)
    {
        $user = PemilikKos::findOrFail($id);

        // Hapus pengguna beserta data terkait
        $user->delete();

        // Redirect atau berikan respon sesuai kebutuhan
        return redirect()->route('datapemilik')->with('success', 'Account deleted successfully');
    }
}
