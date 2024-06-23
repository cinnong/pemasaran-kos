<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pemilik Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen">
        <div
            class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Daftar sebagai Pemilik Kos
                </h1>
                <form method="POST" action="{{ route('pemilik_kos.register.store') }}" class="space-y-4 md:space-y-6">
                    @csrf
                    <!-- Nama -->
                    <div>
                        <x-input-label for="nama" :value="'Nama'"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <x-text-input id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <!-- No HP -->
                    <div>
                        <x-input-label for="no_hp" :value="'No HP'"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <x-text-input id="no_hp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="text" name="no_hp" :value="old('no_hp')" required autocomplete="no_hp" />
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="'Email'"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <x-text-input id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="email" name="email" :value="old('email')" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="'Password'"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <x-text-input id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="password" name="password" required autocomplete="new-password"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="'Konfirmasi Password'"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                        <x-text-input id="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="password" name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-primary-button class="ms-3">
                        {{ __('Register') }}
                    </x-primary-button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Sudah punya akun? <a href="{{ route('login') }}"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Masuk
                            disini</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
