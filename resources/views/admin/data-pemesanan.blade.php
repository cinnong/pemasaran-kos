@extends('layouts.admin')
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pemesanan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Pemilik Kos</th>
                        <th>Tgl Pemesanan</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl Keluar</th>
                        <th>Tipe Kos</th>
                        <th>Per Bulan</th>
                        <th>Total Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pemesanans as $pemesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <h6 class="mb-0 text-truncate text-capitalize">{{ $pemesanan->user->name }}</h6>
                            </td>
                            <td>{{ $pemesanan->pemilikKos->nama }}</td>
                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td>{{ $pemesanan->tanggal_masuk }}</td>
                            <td>{{ $pemesanan->tanggal_keluar }}</td>
                            <td>{{ $pemesanan->tipe_kos }}</td>
                            <td>{{ $pemesanan->per_bulan }}</td>
                            <td>{{ $pemesanan->total_biaya }}</td>
                            <td>
                                <form id="deleteAccountForm" action="{{ route('pemesanan.delete', $pemesanan->id) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="deleteAccountButton"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('deleteAccountButton').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Menghapus akun anda dapat menghapus semua data yang berkaitan dengan akun anda!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteAccountForm').submit();
                }
            });
        });
    </script>
@endsection
