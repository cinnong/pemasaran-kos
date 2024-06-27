<div class="w-64 bg-white shadow-md">
    <div class="p-4 text-center bg-blue-600 text-white">
        <h1 class="text-xl font-bold">Kos-Pedia</h1>
        <p class="text-sm">{{ Auth::guard('pemilik_kos')->user()->nama }}</p>
    </div>
    <ul class="mt-4">
        <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <a href="{{ route('pemilik.dashboard') }}">Dashboard</a>
        </li>
        <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <a href="{{ route('pemilik.datakos') }}">Data Kos</a>
        </li>
        <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <a href="{{ route('pemilik.user') }}">User</a>
        </li>
        <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <a href="{{ route('pemilik.pemesanan') }}">Pemesanan</a>
        </li>
        <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <a href="{{ route('pemilik.pembayaran') }}">Pembayaran</a>
        </li>
        <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    <!-- Unique Logout Icon -->
                    <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                </button>
            </form>
        </li>
        {{-- <li class="px-6 py-2 hover:bg-blue-600 hover:text-white">
            <a href="">Logout</a>
        </li> --}}
    </ul>
</div>
