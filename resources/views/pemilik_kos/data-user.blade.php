@extends('layouts.pemilik')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h1 class="text-2xl font-bold mb-4">Data User</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="w-1/4 px-4 py-2">Nama User</th>
                            <th class="w-1/4 px-4 py-2">Usia</th>
                            <th class="w-1/4 px-4 py-2">Jenis Kelamin</th>
                            <th class="w-1/4 px-4 py-2">Pekerjaan</th>
                            <th class="w-1/4 px-4 py-2">No. Telp</th>
                            <th class="w-1/4 px-4 py-2">Email</th>
                            <th class="w-1/4 px-4 py-2">Tanggal Pembayaran</th>
                            <th class="w-1/4 px-4 py-2">Upload Bukti Pembayaran</th>
                            <th class="w-1/4 px-4 py-2">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $bayar)
                            <tr>
                                <td class="border px-4 py-2">{{ $bayar->pemesanan->user->name }}</td>
                                <td class="border px-4 py-2">{{ $bayar->pemesanan->user->usia }}</td>
                                <td class="border px-4 py-2">{{ $bayar->pemesanan->user->jenis_kelamin }}</td>
                                <td class="border px-4 py-2">{{ $bayar->pemesanan->user->pekerjaan }}</td>
                                <td class="border px-4 py-2">{{ $bayar->pemesanan->user->notlp }}</td>
                                <td class="border px-4 py-2">{{ $bayar->pemesanan->user->email }}</td>
                                <td class="border px-4 py-2">{{ $bayar->tanggal_pembayaran }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ asset('storage/' . $bayar->upload_bukti_pembayaran) }}"
                                        target="_blank">Lihat</a>
                                </td>
                                <td class="border px-4 py-2">{{ $bayar->status_pembayaran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
