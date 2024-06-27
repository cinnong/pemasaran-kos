@extends('layouts.pemilik')

@section('content')
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Kos</h1>
            <a href="{{ route('datakos.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah
                Kos</a>
        </div>

        <div class="bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-4 py-2 border-b text-left">Nama</th>
                        <th class="px-4 py-2 border-b text-left">Lokasi</th>
                        <th class="px-4 py-2 border-b text-left">Harga</th>
                        <th class="px-4 py-2 border-b text-left">Jumlah Kamar</th>
                        <th class="px-4 py-2 border-b text-left">Tipe Kos</th>
                        <th class="px-4 py-2 border-b text-left">Deskripsi</th>
                        <th class="px-4 py-2 border-b text-left">No. Telp</th>
                        <th class="px-4 py-2 border-b text-left">Foto</th>
                        <th class="px-4 py-2 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKos as $datakos)
                        <tr>
                            <td class="px-4 py-2 border-b text-left">{{ $datakos->nama }}</td>
                            <td class="px-4 py-2 border-b text-left">{{ $datakos->lokasi }}</td>
                            <td class="px-4 py-2 border-b text-left">{{ $datakos->harga }}</td>
                            <td class="px-4 py-2 border-b text-left">{{ $datakos->jumlah_kamar }}</td>
                            <td class="px-4 py-2 border-b text-left">{{ $datakos->tipekos }}</td>
                            <td class="px-4 py-2 border-b text-left">
                                <div class="truncate w-40">{{ $datakos->deskripsi }}</div>
                            </td>
                            <td class="px-4 py-2 border-b text-left">{{ $datakos->notlp }}</td>
                            <td class="px-4 py-2 border-b text-left">
                                @if ($datakos->foto)
                                    <img src="{{ asset('photos/kos/' . $datakos->foto) }}" alt="Foto Kos"
                                        class="w-24 h-auto">
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b text-left flex space-x-2">
                                <a href="{{ route('beranda', $datakos->id) }}"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                                <a href="{{ route('datakos.edit', $datakos->id) }}"
                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Edit</a>
                                <form action="{{ route('datakos.destroy', $datakos->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
