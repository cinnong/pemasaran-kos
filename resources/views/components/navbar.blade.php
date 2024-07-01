<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('photos/logo.png') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">KosPedia</span>
            </div>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <!-- Unique Logout Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 2L2 7v2h2v11h16V9h2V7zm0 2l7 4v10h-3v-8H8v8H5V8l7-4zm-3 7h6v8h-6z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                            </button>
                        </form>
                    @else
                        <div class="relative">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 gap-4"
                                aria-haspopup="true" aria-expanded="false" id="login-dropdown">
                                Login
                            </button>
                            <ul class="absolute right-0 mt-2 w-56 origin-top-right bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-700 rounded-md shadow-lg hidden"
                                id="login-options">
                                <li>
                                    <a href="{{ route('pemilik_kos.login_form') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white">Pemilik
                                        Kos</a>
                                </li>
                                <li>
                                    <a href="{{ route('login-admin') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white">Admin</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white">Pencari
                                        Kos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="relative">
                            <button type="button"
                                class="ml-4 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                                aria-haspopup="true" aria-expanded="false" id="register-dropdown">
                                Register
                            </button>
                            <ul class="absolute right-0 mt-2 w-56 origin-top-right bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-700 rounded-md shadow-lg hidden"
                                id="register-options">
                                <li>
                                    <a href="{{ route('pemilik_kos.register') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white">Pemilik
                                        Kos</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white">Pencari
                                        Kos</a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                @endif
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('beranda') }}"
                            class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#kos"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kosan</a>
                    </li>
                    <li>
                        <form action="{{ route('search') }}" method="GET"
                            class="relative flex items-center space-x-2 w-full">
                            <div class="relative flex-1 w-96">
                                <input type="text" name="query" id="query"
                                    placeholder="Search by name, location, or price..."
                                    class="w-full p-2 pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <svg class="w-5 h-5 text-gray-500 absolute left-3 top-1/2 transform -translate-y-1/2 dark:text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M10 2a8 8 0 0 1 5.292 13.708l5.363 5.364-1.414 1.414-5.364-5.363A8 8 0 1 1 10 2m0-2C4.477 0 0 4.477 0 10s4.477 10 10 10a9.95 9.95 0 0 0 6.364-2.236l5.517 5.518L24 22.093l-5.518-5.517A9.95 9.95 0 0 0 20 10c0-5.523-4.477-10-10-10z" />
                                </svg>
                            </div>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerDropdown = document.getElementById('register-dropdown');
            const registerOptions = document.getElementById('register-options');
            const loginDropdown = document.getElementById('login-dropdown');
            const loginOptions = document.getElementById('login-options');

            registerDropdown.addEventListener('click', function(event) {
                event.stopPropagation();
                registerOptions.classList.toggle('hidden');
                loginOptions.classList.add('hidden');
            });

            loginDropdown.addEventListener('click', function(event) {
                event.stopPropagation();
                loginOptions.classList.toggle('hidden');
                registerOptions.classList.add('hidden');
            });

            // Close dropdowns if clicked outside
            document.addEventListener('click', function(event) {
                if (!registerDropdown.contains(event.target)) {
                    registerOptions.classList.add('hidden');
                }
                if (!loginDropdown.contains(event.target)) {
                    loginOptions.classList.add('hidden');
                }
            });

            // Prevent dropdown from closing when clicking inside the dropdown
            registerOptions.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            loginOptions.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>
</body>

</html>
