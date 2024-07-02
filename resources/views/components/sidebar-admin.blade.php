<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-semibold ms-2">KosPedia</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('beranda-admin') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('beranda-admin') ? 'active' : '' }}">
                    <a href="{{ route('beranda-admin') }}" class="menu-link">
                        <div data-i18n="CRM">All Data</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Data Master -->
        <li class="menu-item {{ request()->routeIs('datauser', 'datakos', 'datapemilik') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-window-maximize"></i>
                <div data-i18n="Layouts">Data Master</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('datauser') ? 'active' : '' }}">
                    <a href="{{ route('datauser') }}" class="menu-link">
                        <div data-i18n="Without menu">Data Pengguna</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('datakos') ? 'active' : '' }}">
                    <a href="{{ route('datakos') }}" class="menu-link">
                        <div data-i18n="Without navbar">Data Kos</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('datapemilik') ? 'active' : '' }}">
                    <a href="{{ route('datapemilik') }}" class="menu-link">
                        <div data-i18n="Container">Data Pemilik Kos</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Data Transaksi -->
        <li class="menu-item {{ request()->routeIs('pemesanans.index', 'pembayaran.show') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-flip-to-front"></i>
                <div data-i18n="Front Pages">Data Transaksi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('pemesanans.index') ? 'active' : '' }}">
                    <a href="{{ route('pemesanans.index') }}" class="menu-link">
                        <div data-i18n="Landing">Data Pemesanan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('pembayaran.show') ? 'active' : '' }}">
                    <a href="{{ route('pembayaran.show') }}" class="menu-link">
                        <div data-i18n="Pricing">Data Pembayaran</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu-link border-transparent bg-transparent">
                    <!-- Unique Logout Icon -->
                    <i class="menu-icon tf-icons mdi mdi-flip-to-front"></i>
                    <div data-i18n="Front Pages">Logout</div>
                </button>
            </form>

        </li>
    </ul>

</aside>
