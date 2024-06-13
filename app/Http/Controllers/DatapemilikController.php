<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapemilik;
use App\Models\Datakos;

class DatapemilikController extends Controller
{
    public function index()
    {
        $datapemilik = Datapemilik::all();
        return view('datakos.data-pemilik', compact('datapemilik'));
    }

    public function create()
    {
        $datapemilik = Datapemilik::all();
        return view('datakos.form-pemilik-kos', compact('datapemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required|email|unique:datapemilik,email',
        ]);

        Datapemilik::create($request->all());
        return redirect()->route('datapemilik.index');
    }

    public function show($id)
    {
        $datapemilik = Datapemilik::findOrFail($id);
        return view('datapemilik.show', compact('datapemilik'));
    }

    public function edit($id)
    {
        $datapemilik = Datapemilik::findOrFail($id);
        return view('datakos.edit-datapemilik', compact('datapemilik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required|email|unique:datapemilik,email,'.$id,
        ]);

        $datapemilik = Datapemilik::findOrFail($id);
        $datapemilik->update($request->all());
        return redirect()->route('datapemilik.index');
    }

    public function destroy($id)
    {
        $datapemilik = Datapemilik::findOrFail($id);
        $datapemilik->delete();
        return redirect()->route('datapemilik.index');
    }
}
