<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kos-Pedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

</head>

<body>
    @include('components.navbar')

    <div class="container mx-auto mt-8 p-6 text-center bg-gray-200 rounded-xl shadow-md">




        <h1 class="text-3xl font-bold mb-4">Selamat datang di <span class="text-blue-600">Kos Pedia</span></h1>
        <p class="text-lg mb-2">Cari kos idaman kini tak perlu susah,</p>
        <p class="text-lg mb-2">Klik saja di sini, semuanya jadi mudah.</p>
        <p class="text-lg mb-2">Temukan tempat nyaman, buat hati senang,</p>
        <p class="text-lg mb-2">Bersama kami, hidup jadi riang.</p>
        <p class="text-lg mb-2">Selamat mencari kos yang pas,</p>
        <p class="text-lg">Di sini semua jadi lebih bebas!</p>
    </div>

    <div
        class="grid gap-6 mt-8 overflow-hidden text-gray-700 shadow-md rounded-xl bg-clip-border sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @include('properties.card')
    </div>


</body>

</html>
