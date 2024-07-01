@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="text-truncate">No</th>
                            <th class="text-truncate">Nama Pemesan</th>
                            <th class="text-truncate">Tgl Pemesanan</th>
                            <th class="text-truncate">Tgl Masuk</th>
                            <th class="text-truncate">Tgl Keluar</th>
                            <th class="text-truncate">Tipe Kos</th>
                            <th class="text-truncate">Per Bulan</th>
                            <th class="text-truncate">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanans as $pemesanan)
                            <tr>
                                <td class="text-truncate">{{ $loop->iteration }}</td>
                                <td>
                                    <h6 class="mb-0 text-truncate text-capitalize">{{ $pemesanan->user->name }}</h6>
                                </td>
                                <td class="text-truncate">{{ $pemesanan->tanggal_pemesanan }}</td>
                                <td class="text-truncate">{{ $pemesanan->tanggal_masuk }}</td>
                                <td class="text-truncate">{{ $pemesanan->tanggal_keluar }}</td>
                                <td class="text-truncate">{{ $pemesanan->tipe_kos }}</td>
                                <td class="text-truncate">{{ $pemesanan->per_bulan }}</td>
                                <td class="text-truncate">{{ $pemesanan->total_biaya }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
