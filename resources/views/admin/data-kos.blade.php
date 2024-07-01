@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="overflow-x-auto">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="text-truncate">Nama</th>
                            <th class="text-truncate">Pemilik</th>
                            <th class="text-truncate">Lokasi</th>
                            <th class="text-truncate">Harga</th>
                            <th class="text-truncate">Jumlah</th>
                            <th class="text-truncate">Tipe Kos</th>
                            <th class="text-truncate">Foto</th>
                            <th class="text-truncate">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakos as $kos)
                            <tr>
                                <td>
                                    <h6 class="mb-0 text-truncate text-capitalize">{{ $kos->pemilikkos->nama }}</h6>
                                </td>
                                <td class="text-truncate">{{ $kos->nama }}</td>
                                <td class="text-truncate">{{ $kos->lokasi }}</td>
                                <td class="text-truncate">{{ $kos->harga }}</td>
                                <td class="text-truncate">{{ $kos->jumlah_kamar }}</td>
                                <td class="text-truncate">{{ $kos->notlp }}</td>
                                <td class="text-truncate">
                                    <img src="{{ asset('photos/kos/' . $kos->foto) }}" alt="Foto Kos" class="w-24 h-auto"
                                        width="100">
                                </td>
                                <td class="text-truncate">
                                    <form action="{{ route('kos.updateStatus', $kos->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-select">
                                            <option value="Pending" {{ $kos->status == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Setuju" {{ $kos->status == 'Setuju' ? 'selected' : '' }}>Setuju
                                            </option>
                                            <option value="Tidak setuju" {{ $kos->status == 'Tidak setuju' ? 'selected' : '' }}>
                                                Tidak setuju</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-2">Update</button>
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
