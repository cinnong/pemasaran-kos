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
                            <th class="text-truncate">No HP</th>
                            <th class="text-truncate">Email</th>
                            <th class="text-truncate">Tanggal Dibuat</th>
                            <th class="text-truncate">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemilikKos as $pemilikKos)
                            <tr>
                                <td class="text-truncate">{{ $pemilikKos->id }}</td>
                                <td>
                                    <h6 class="mb-0 text-truncate text-capitalize">{{ $pemilikKos->nama }}</h6>
                                </td>
                                <td class="text-truncate">{{ $pemilikKos->no_hp }}</td>
                                <td class="text-truncate">{{ $pemilikKos->email }}</td>
                                <td class="text-truncate">{{ $pemilikKos->created_at }}</td>
                                <td class="text-truncate">
                                    <form action="{{ route('pemilik_kos.destroy', $pemilikKos->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
