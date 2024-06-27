@extends('layouts.pemilik')

@section('content')
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Data Pembayaran</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 border-b">Nama User</th>
                            <th class="px-4 py-2 border-b">Usia</th>
                            <th class="px-4 py-2 border-b">Jenis Kelamin</th>
                            <th class="px-4 py-2 border-b">Pekerjaan</th>
                            <th class="px-4 py-2 border-b">No. Telp</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">ID Pemesanan</th>
                            <th class="px-4 py-2 border-b">Tanggal Pembayaran</th>
                            <th class="px-4 py-2 border-b">Bukti Pembayaran</th>
                            <th class="px-4 py-2 border-b">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPembayaran as $pembayaran)
                            <tr>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan->user->name }}</td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan->user->usia }}</td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan->user->jenis_kelamin }}
                                </td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan->user->pekerjaan }}
                                </td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan->user->notlp }}</td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan->user->email }}</td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->pemesanan_id }}</td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->tanggal_pembayaran }}</td>
                                <td class="px-4 py-2 border-b text-center">
                                    @if ($pembayaran->upload_bukti_pembayaran)
                                        <a href="{{ asset('photos/bukti/' . $pembayaran->upload_bukti_pembayaran) }}"
                                            target="_blank">
                                            Lihat Bukti
                                        </a>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b text-center">{{ $pembayaran->status_pembayaran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
