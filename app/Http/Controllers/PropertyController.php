<?php

namespace App\Http\Controllers;

use App\Models\properties;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = properties::all();
        return view('propertis.table', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'lokasi' => 'required',
        'harga' => 'required|integer',
        'status' => 'required',
        'deskripsi' => 'required',
    ]);

    // Exclude _token from the request data
    $data = $request->except('_token');

    Properties::create($data);

    return redirect()->route('dashboard')
        ->with('success', 'Property created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\properties  $property
     * @return \Illuminate\Http\Response
     */
    public function show(properties $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\properties  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(properties $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\properties  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, properties $property)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $property->update($request->all());

        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\properties  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(properties $property)
    {
        $property->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Property deleted successfully');
    }
}
