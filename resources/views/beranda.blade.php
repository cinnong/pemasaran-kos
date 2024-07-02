<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kos-Pedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen">
    @include('components.navbar')

    <div class="h-24"></div>
    <div class="flex-1 mx-auto mt-8 p-6">
        <h1 class="text-3xl font-bold mb-4">Selamat datang di <span class="text-blue-600">KosPedia</span></h1>
        <p class="text-lg mb-2">Cari kos idaman kini tak perlu susah, Klik saja di sini, semuanya jadi mudah.
            Temukan tempat nyaman, buat hati senang, bersama kami, hidup jadi riang.</p>
        <p id="kos" class="text-lg mb-2">Selamat mencari kos yang pas, di sini semua jadi lebih bebas!</p>
    </div>
    <div
        class="grid gap-6 mt-8 overflow-hidden text-gray-700 shadow-md rounded-xl bg-clip-border sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @include('datakos.card')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-8">
        <div class="max-w-7xl mx-auto py-4 px-5 flex justify-between items-center">
            <div class="text-sm text-center w-full">
                &copy; 2024 KosPedia. All rights reserved.
            </div>
            <div class="flex justify-end w-full">
                <a href="https://wa.me/6281241610532" class="text-gray-400 hover:text-white">Contact Us</a>
            </div>
        </div>
    </footer>
</body>

</html>
