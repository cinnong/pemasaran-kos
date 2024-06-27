@extends('layouts.pemilik')

@section('content')
    <div class="container mx-auto py-6 px-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl text-center font-bold mb-6 text-gray-800">Data Pemesanan</h2>
        <div class="overflow-x-auto overflow-y-auto relative">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">No</th>
                        <th class="py-3 px-6 text-center">Nama Pemesan</th>
                        <th class="py-3 px-6 text-center">Tgl Pemesanan</th>
                        <th class="py-3 px-6 text-center">Tgl Masuk</th>
                        <th class="py-3 px-6 text-center">Tgl Keluar</th>
                        <th class="py-3 px-6 text-center">Tipe Kos</th>
                        <th class="py-3 px-6 text-center">Per Bulan</th>
                        <th class="py-3 px-6 text-center">Harga</th>
                        <th class="py-3 px-6 text-center">Total Biaya</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-black text-sm font-dark">
                    @foreach ($pesananKos as $pemesanan)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->user->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tanggal_masuk }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tanggal_keluar }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tipe_kos }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->per_bulan }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->harga }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->total_biaya }}</td>
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('pemesanans.update', ['pemesanan' => $pemesanan]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <select class="form-control rounded-lg border-gray-200" name="aksi" required>
                                            <option value="Setuju" {{ $pemesanan->aksi == 'Setuju' ? 'selected' : '' }}>
                                                Setuju</option>
                                            <option value="Tidak setuju"
                                                {{ $pemesanan->aksi == 'Tidak setuju' ? 'selected' : '' }}>Tidak setuju
                                            </option>
                                            <option value="Pending" {{ $pemesanan->aksi == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                        </select>
                                    </div>
                                    <button type="submit"
                                        class="btn bg-blue-500 text-white rounded-lg px-4 py-2 mt-2 hover:bg-blue-600 transition duration-200">Simpan</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
