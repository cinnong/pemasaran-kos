@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="text-truncate">ID</th>
                            <th class="text-truncate">Nama</th>
                            <th class="text-truncate">Usia</th>
                            <th class="text-truncate">JK</th>
                            <th class="text-truncate">Pekerjaan</th>
                            <th class="text-truncate">Email</th>
                            <th class="text-truncate">Nomor Telp</th>
                            <th class="text-truncate">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-truncate">{{ $user->id }}</td>
                                <td>
                                    <h6 class="mb-0 text-truncate text-capitalize">{{ $user->name }}</h6>
                                </td>
                                <td class="text-truncate">{{ $user->usia }} Tahun</td>
                                <td class="text-truncate">{{ $user->jenis_kelamin }}</td>
                                <td class="text-truncate">{{ $user->pekerjaan }}</td>
                                <td class="text-truncate">{{ $user->email }}</td>
                                <td class="text-truncate">{{ $user->notlp }}</td>
                                <td class="text-truncate">
                                    <form id="deleteAccountForm" action="{{ route('user.delete', $user->id) }}"
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
