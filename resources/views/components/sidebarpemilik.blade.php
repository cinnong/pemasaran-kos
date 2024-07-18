<div class="w-64 bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4 text-center bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
        <h1 class="text-2xl font-bold">Kos-Pedia</h1>
        <p class="text-sm">{{ Auth::guard('pemilik_kos')->user()->nama }}</p>
    </div>
    <ul class="mt-4">
        <li class="px-6 py-3 hover:bg-purple-100 transition duration-200">
            <a href="{{ route('pemilik.dashboard') }}" class="flex items-center space-x-2 text-gray-700">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18">
                    </path>
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="px-6 py-3 hover:bg-purple-100 transition duration-200">
            <a href="{{ route('pemilik.datakos') }}" class="flex items-center space-x-2 text-gray-700">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18">
                    </path>
                </svg>
                <span>Data Kos</span>
            </a>
        </li>
        <li class="px-6 py-3 hover:bg-purple-100 transition duration-200">
            <a href="{{ route('pemilik.user') }}" class="flex items-center space-x-2 text-gray-700">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18">
                    </path>
                </svg>
                <span>User</span>
            </a>
        </li>
        <li class="px-6 py-3 hover:bg-purple-100 transition duration-200">
            <a href="{{ route('pemilik.pemesanan') }}" class="flex items-center space-x-2 text-gray-700">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18">
                    </path>
                </svg>
                <span>Pemesanan</span>
            </a>
        </li>
        <li class="px-6 py-3 hover:bg-purple-100 transition duration-200">
            <a href="{{ route('pemilik.pembayaran') }}" class="flex items-center space-x-2 text-gray-700">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18">
                    </path>
                </svg>
                <span>Pembayaran</span>
            </a>
        </li>
        <li class="px-6 py-3 hover:bg-purple-100 transition duration-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center space-x-2 w-full text-left text-gray-700">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-5V9m0 5V4"></path>
                    </svg>
                    <span>Log Out</span>
                </button>
            </form>
        </li>
    </ul>
</div>
