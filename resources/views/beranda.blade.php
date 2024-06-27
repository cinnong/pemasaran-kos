<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kos-Pedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @auth
        @if (Auth::user()->role === 'pencari')
            @include('components.navbar')

            <div class="h-24"></div>

            <div class="mx-auto mt-8 p-6">
                <h1 class="text-3xl font-bold mb-4">Selamat datang di <span class="text-blue-600">Kos Pedia</span></h1>
                <p class="text-lg mb-2">Cari kos idaman kini tak perlu susah, Klik saja di sini, semuanya jadi mudah.
                    Temukan
                    tempat nyaman, buat hati senang, bersama kami, hidup jadi riang.</p>
                <p id="kos" class="text-lg mb-2">Selamat mencari kos yang pas, di sini semua jadi lebih bebas!</p>
            </div>
            <div
                class="grid gap-6 mt-8 overflow-hidden text-gray-700 shadow-md rounded-xl bg-clip-border sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @include('datakos.card')
            </div>
        @elseif(Auth::user()->role === 'admin')
        @include('components.sidebar')
        <div class="p-4 sm:ml-64">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    {{-- Card DataPengguna --}}
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-red-500 text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h5 class="text-lg leading-6 font-semibold text-gray-900 dark:text-white">Data
                                            Pengguna</h5>
                                        <p class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-400">Total Data
                                            Pengguna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">{{ $countuser }}</div>
                            <a href="{{ route('datauser') }}"
                                class="inline-flex items-center mt-4 text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                                More info
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
    
                    <!-- Card Datakos-->
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-red-500 text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h5 class="text-lg leading-6 font-semibold text-gray-900 dark:text-white">Data Kos
                                        </h5>
                                        <p class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-400">Total Data
                                            Kos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">{{ $count }}</div>
                            <a href="/datakos"
                                class="inline-flex items-center mt-4 text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                                More info
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
    
                    {{-- Card DataPemilik --}}
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-red-500 text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h5 class="text-lg leading-6 font-semibold text-gray-900 dark:text-white">Data
                                            Pemilik</h5>
                                        <p class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-400">Total Data
                                            Pemili</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">{{ $countpemilik }}</div>
                            <a href="/datapemilik"
                                class="inline-flex items-center mt-4 text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300">
                                More info
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @else
        @include('components.navbar')

        <div class="h-24"></div>

        <div class="mx-auto mt-8 p-6">
            <h1 class="text-3xl font-bold mb-4">Selamat datang di <span class="text-blue-600">Kos Pedia</span></h1>
            <p class="text-lg mb-2">Cari kos idaman kini tak perlu susah, Klik saja di sini, semuanya jadi mudah.
                Temukan tempat nyaman, buat hati senang, bersama kami, hidup jadi riang.</p>
            <p id="kos" class="text-lg mb-2">Selamat mencari kos yang pas, di sini semua jadi lebih bebas!</p>
        </div>
        <div
            class="grid gap-6 mt-8 overflow-hidden text-gray-700 shadow-md rounded-xl bg-clip-border sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @include('datakos.card')
        </div>
    @endauth
</body>

</html>
