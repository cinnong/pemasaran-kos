@extends('layouts.pemilik')

@section('content')
    <div class="container mx-auto mt-8 px-4 max-w-7xl">
        <h2 class="text-4xl font-bold mb-8 text-center text-gray-800">Dashboard Pemilik Kos</h2>

        <!-- Statistik -->
        <div class="grid gap-8 mb-12 md:grid-cols-2 xl:grid-cols-3">
            <!-- Statistik 1 -->
            <div class="flex items-center p-6 bg-blue-100 rounded-xl shadow-lg transform transition hover:scale-105">
                <!-- Ikon -->
                <div class="p-4 mr-6 text-blue-600 bg-blue-200 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M17 9V7a5 5 0 00-10 0v2a5 5 0 00-5 5v2a5 5 0 005 5h10a5 5 0 005-5v-2a5 5 0 00-5-5zm-8-2a3 3 0 116 0v2H9V7zm4 10a3 3 0 11-6 0h6zm-1 0h-4a1 1 0 010-2h4a1 1 0 010 2z" />
                    </svg>
                </div>
                <!-- Tautan ke halaman terkait -->
                <a href="{{ route('pemilik.user') }}" class="flex flex-col text-gray-700 hover:text-blue-600">
                    <!-- Judul -->
                    <p class="mb-1 text-lg font-medium">Total User</p>
                    <!-- Data statistik -->
                    <p class="text-2xl font-bold">{{ $jumlahUserPesan }}</p>
                </a>
            </div>

            <!-- Statistik 2 -->
            <div class="flex items-center p-6 bg-green-100 rounded-xl shadow-lg transform transition hover:scale-105">
                <div class="p-4 mr-6 text-green-600 bg-green-200 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a7 7 0 100 14 7 7 0 000-14zm2 8H8v-2h4v2z" />
                    </svg>
                </div>
                <a href="{{ route('pemilik.pemesanan') }}" class="flex flex-col text-gray-700 hover:text-green-600">
                    <p class="mb-1 text-lg font-medium">Total Pemesanan</p>
                    <p class="text-2xl font-bold">{{ $jumlahPemesanan }}</p>
                </a>
            </div>

            <!-- Statistik 3 -->
            <div class="flex items-center p-6 bg-red-100 rounded-xl shadow-lg transform transition hover:scale-105">
                <div class="p-4 mr-6 text-red-600 bg-red-200 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M6 2a1 1 0 00-1 1v2H4a1 1 0 000 2h1v10a1 1 0 001 1h8a1 1 0 001-1V7h1a1 1 0 100-2h-1V3a1 1 0 00-1-1H6zM7 4h6v2H7V4zm2 6a1 1 0 012 0v5a1 1 0 11-2 0v-5z" />
                    </svg>
                </div>
                <a href="{{ route('pemilik.pembayaran') }}" class="flex flex-col text-gray-700 hover:text-red-600">
                    <p class="mb-1 text-lg font-medium">Total Pembayaran</p>
                    <p class="text-2xl font-bold">{{ $jumlahPembayaran }}</p>
                </a>
            </div>
        </div>
    </div>
@endsection
