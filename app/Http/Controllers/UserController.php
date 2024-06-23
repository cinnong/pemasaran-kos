<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.data-user', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'usia' => 'nullable|integer',
        'jenis_kelamin' => 'required|string',
        'pekerjaan' => 'required|string',
        'notlp' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$id,
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->input('name');
    $user->usia = $request->input('usia');
    $user->jenis_kelamin = $request->input('jenis_kelamin');
    $user->pekerjaan = $request->input('pekerjaan');
    $user->notlp = $request->input('notlp');
    $user->email = $request->input('email');

    $user->save();

    return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diupdate.');
}


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}

