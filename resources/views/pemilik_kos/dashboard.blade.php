@extends('layouts.pemilik')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-3xl font-bold mb-6">Dashboard Pemilik Kos</h2>

        <!-- Statistik -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11h16M2 7h16m-8 8h8"></path>
                    </svg>
                </div>
                <a href="{{ route('pemilik.user') }}" style="text-decoration: none; color: inherit;">
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total User</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $jumlahUserPesan }}</p>
                    </div>
                </a>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11h16M2 7h16m-8 8h8"></path>
                    </svg>
                </div>
                <a href="{{ route('pemilik.pemesanan') }}" style="text-decoration: none; color: inherit;">
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Pemesanan</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $jumlahPemesanan }}</p>
                    </div>
                </a>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11h16M2 7h16m-8 8h8"></path>
                    </svg>
                </div>
                <a href="{{ route('pemilik.pembayaran') }}" style="text-decoration: none; color: inherit;">
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $jumlahPembayaran }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
