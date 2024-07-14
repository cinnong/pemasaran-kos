<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(): View
    {
        $users = User::all();
        return view('user.data-user', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'usia' => ['required', 'integer'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'notlp' => ['required', 'string', 'max:20'], // Definisi validasi untuk nomor telepon
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'notlp' => $request->notlp, // Menyimpan nomor telepon yang diinput
            'password' => Hash::make($request->password),
            'role' => 'pencari',
        ]);

        event(new Registered($user));


        return redirect()->route('login');
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view('datauser.show', compact('user'));
    }

    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Periksa apakah pengguna memiliki role "pencari"
        if ($user->role == 'admin') {
            return redirect()->route('datauser')->with('error', 'User tidak dapat dihapus karena bukan pencari.');
        }

        // Hapus pengguna
        $user->delete();

        return redirect()->route('datauser')->with('success', 'User berhasil dihapus.');
    }
}
