@extends('layouts.admin')

@section('content')
    <div class="card">
        <h5 class="card-header">Data Kos</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Pemilik </th>
                        <th>Nomor Telpon </th>
                        <th>Nama Kos</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Tipe Kos</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($datakos as $kos)
                        <tr>
                            <td>
                                <h6 class="mb-0 text-truncate text-capitalize">{{ $kos->pemilikkos->nama }}</h6>
                            </td>
                            <td class="text-truncate">{{ $kos->notlp }}</td>
                            <td class="text-truncate">{{ $kos->nama }}</td>
                            <td class="text-truncate">{{ $kos->lokasi }}</td>
                            <td class="text-truncate">{{ $kos->harga }}</td>
                            <td class="text-truncate">{{ $kos->jumlah_kamar }}</td>
                            <td class="text-truncate">{{ $kos->tipekos }}</td>
                            <td class="text-truncate">{{ $kos->deskripsi }}</td>
                            <td class="text-truncate">
                                <img src="{{ asset('photos/kos/' . $kos->foto) }}" alt="Foto Kos" class="w-24 h-auto"
                                    width="100">
                            </td>
                            <td class="text-truncate">
                                <form id="updateForm-{{ $kos->id }}"
                                    action="{{ route('kos.updateStatus', $kos->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select">
                                        <option value="Pending" {{ $kos->status == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Setuju" {{ $kos->status == 'Setuju' ? 'selected' : '' }}>Setuju
                                        </option>
                                        <option value="Tidak setuju"
                                            {{ $kos->status == 'Tidak setuju' ? 'selected' : '' }}>Tidak setuju</option>
                                    </select>
                                    <button type="button" class="btn btn-primary mt-2 updateButton"
                                        data-id="{{ $kos->id }}">Update</button>
                                </form>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('detailkos', $kos->id) }}"><i
                                                class="mdi mdi-eye-outline me-1"></i> View</a>
                                        <a class="dropdown-item" href="{{ route('edit-datakos-admin', $kos->id) }}"><i
                                                class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                        <form id="deleteForm-{{ $kos->id }}"
                                            action="{{ route('deletekos-admin', $kos->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" id="deleteButton-{{ $kos->id }}"
                                                class="border-none bg-transparent dropdown-item deleteButton">
                                                <i class="mdi mdi-trash-can-outline me-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.updateButton').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const formId = this.dataset.id;
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan bisa mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, perbarui!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('updateForm-' + formId).submit();
                        document.getElementById('statusMessage').style.display = 'block';
                        setTimeout(() => {
                            Swal.fire(
                                'Diperbarui!',
                                'Data Kos berhasil diperbarui.',
                                'success'
                            );
                        }, 500);
                    }
                });
            });
        });

        document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const formId = this.id.split('-')[1];
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm-' + formId).submit();
                    }
                });
            });
        });
    </script>

    <p id="statusMessage" class="message">Data Kos berhasil diperbarui</p>
@endsection
