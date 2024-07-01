<?php

namespace App\Http\Controllers;

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
}
