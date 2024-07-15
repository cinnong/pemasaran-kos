@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="text-truncate">No</th>
                            <th class="text-truncate">ID</th>
                            <th class="text-truncate">Nama Pemesan</th>
                            <th class="text-truncate">Tgl Pembayaran</th>
                            <th class="text-truncate">Status Pembayaran</th>
                            <th class="text-truncate">Bukti Pembayaran</th>
                            <th class="text-truncate">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $pembayaran)
                            <tr>
                                <td class="text-truncate">{{ $loop->iteration }}</td>
                                <td class="text-truncate">{{ $pembayaran->id }}</td>
                                <td>
                                    <h6 class="mb-0 text-truncate text-capitalize">
                                        {{ $pembayaran->pemesanan->user->name ?? 'N/A' }}
                                    </h6>
                                </td>
                                <td class="text-truncate">{{ $pembayaran->tanggal_pembayaran }}</td>
                                <td class="text-truncate">{{ $pembayaran->status_pembayaran }}</td>
                                <td class="text-truncate">
                                    @if ($pembayaran->upload_bukti_pembayaran)
                                        <a href="{{ asset('photos/bukti/' . $pembayaran->upload_bukti_pembayaran) }}"
                                            target="_blank" class="text-blue-500 hover:underline">Lihat Bukti</a>
                                    @else
                                        Tidak ada bukti pembayaran
                                    @endif
                                </td>
                                <td class="text-truncate">
                                    <form id="deleteAccountForm" action="{{ route('pembayaran.delete', $pembayaran->id) }}"
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
