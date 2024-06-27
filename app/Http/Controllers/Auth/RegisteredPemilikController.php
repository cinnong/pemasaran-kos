<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PemilikKos;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredPemilikController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.pemilik_kos-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(): View
    {
        $pemilikKos = PemilikKos::all();
        return view('pemilik_kos.data-pemilik', compact('pemilikKos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:pemilik_kos',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $pemilikKos = PemilikKos::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($pemilikKos));


        return redirect()->route('pemilik_kos.login_form');
    }

    public function show($id): View
    {
        $pemilikKos = PemilikKos::findOrFail($id);
        return view('pemilik_kos.show', compact('pemilikKos'));
    }
}
