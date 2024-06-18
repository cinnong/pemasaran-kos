@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Hasil Pencarian untuk lokasi "{{ $locationQuery }}"</h1>
        @if ($datakos->isEmpty())
            <p class="text-gray-600">Tidak ada hasil yang ditemukan.</p>
        @else
            <ul>
                @foreach ($datakos as $kosan)
                    <li class="mb-4 p-4 bg-white rounded-lg shadow">
                        <h2 class="text-xl font-semibold">{{ $kosan->nama }}</h2>
                        <p>{{ $kosan->lokasi }}</p>
                        <p>{{ $kosan->harga }}</p>
                        <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
