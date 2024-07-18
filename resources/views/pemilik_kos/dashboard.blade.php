@extends('layouts.pemilik')

@section('content')
    <div class="container mx-auto mt-8 px-4 max-w-7xl">
        <h2 class="text-4xl font-bold mb-8 text-center text-gray-800">Dashboard Pemilik Kos</h2>

        <!-- Statistik -->
        <div class="grid gap-8 mb-12 md:grid-cols-2 xl:grid-cols-3">
            <div class="flex items-center p-6 bg-blue-50 rounded-xl shadow-lg transform transition hover:scale-105">
                <div class="p-4 mr-6 text-blue-600 bg-blue-100 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H4zm1 2h10v10H5V5zm2 2v2h6V7H7zm0 4v2h4v-2H7z"/>
                    </svg>
                </div>
                <a href="{{ route('pemilik.user') }}" class="flex flex-col text-gray-700 hover:text-blue-500">
                    <p class="mb-1 text-lg font-medium">Total User</p>
                    <p class="text-2xl font-bold">{{ $jumlahUserPesan }}</p>
                </a>
            </div>

            <div class="flex items-center p-6 bg-green-50 rounded-xl shadow-lg transform transition hover:scale-105">
                <div class="p-4 mr-6 text-green-600 bg-green-100 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a7 7 0 100 14 7 7 0 000-14zm1 10H9V9h2v4zm0-6H9V5h2v2z"/>
                    </svg>
                </div>
                <a href="{{ route('pemilik.pemesanan') }}" class="flex flex-col text-gray-700 hover:text-green-500">
                    <p class="mb-1 text-lg font-medium">Total Pemesanan</p>
                    <p class="text-2xl font-bold">{{ $jumlahPemesanan }}</p>
                </a>
            </div>

            <div class="flex items-center p-6 bg-red-50 rounded-xl shadow-lg transform transition hover:scale-105">
                <div class="p-4 mr-6 text-red-600 bg-red-100 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 2a1 1 0 00-1 1v2H4a1 1 0 000 2h1v10a1 1 0 001 1h8a1 1 0 001-1V7h1a1 1 0 100-2h-1V3a1 1 0 00-1-1H6zM7 4h6v2H7V4zm2 6a1 1 0 012 0v5a1 1 0 11-2 0v-5z"/>
                    </svg>
                </div>
                <a href="{{ route('pemilik.pembayaran') }}" class="flex flex-col text-gray-700 hover:text-red-500">
                    <p class="mb-1 text-lg font-medium">Total Pembayaran</p>
                    <p class="text-2xl font-bold">{{ $jumlahPembayaran }}</p>
                </a>
            </div>
        </div>
    </div>
@endsection
