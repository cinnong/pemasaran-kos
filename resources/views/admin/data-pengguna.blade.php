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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
