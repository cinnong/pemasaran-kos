@extends('layouts.admin')
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Edit Kos Admin</h5>
        <form class="card-body" action="{{ route('editkos-admin', $datakos->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" id="nama" name="nama" value="{{ $datakos->nama }}" />
                <label for="nama">Nama</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" id="lokasi" name="lokasi" value="{{ $datakos->lokasi }}" />
                <label for="lokasi">Lokasi</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" id="harga" name="harga" value="{{ $datakos->harga }}"
                    oninput="validateNumberInput(this)" />
                <label for="harga">Harga</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" id="jumlah_kamar" name="jumlah_kamar"
                    value="{{ $datakos->jumlah_kamar }}" oninput="validateNumberInput(this)" />
                <label for="jumlah_kamar">Jumlah Kamar</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <select id="largeSelect" class="form-select form-select-lg" name="tipekos">
                    <option>Tipe Kos</option>
                    <option value="pria" {{ $datakos->tipekos == 'pria' ? 'selected' : '' }}>
                        Pria
                    </option>
                    <option value="wanita" {{ $datakos->tipekos == 'wanita' ? 'selected' : '' }}>
                        Wanita
                    </option>
                    <option value="campuran" {{ $datakos->tipekos == 'campuran' ? 'selected' : '' }}>
                        Campuran
                    </option>
                </select>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="file" id="formFile" name="foto" />
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <textarea class="form-control h-px-100" id="deskripsi" name="deskripsi">{{ $datakos->deskripsi }}</textarea>
                <label for="deskripsi">Example textarea</label>
            </div>
            <a href="{{ route('datakos') }}" class="btn btn-info">Kembali</a>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>

    <script>
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>
@endsection
