<!-- resources/views/pemilik/pesanan.blade.php -->
@extends('layouts.pemilik')

@section('content')
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Pemesan Kamar Kos</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-4 py-2 border-b">Nama Pemesan</th>
                        <th class="px-4 py-2 border-b">Usia</th>
                        <th class="px-4 py-2 border-b">Jenis Kelamin</th>
                        <th class="px-4 py-2 border-b">Pekerjaan</th>
                        <th class="px-4 py-2 border-b">No. Telp</th>
                        <th class="px-4 py-2 border-b">Email</th>
                        <th class="px-4 py-2 border-b">Tanggal Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesananKos as $pesanan)
                        <tr>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->user->name }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->user->usia }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->user->jenis_kelamin }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->user->pekerjaan }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->user->notlp }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->user->email }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $pesanan->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
