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
    @include('components.navbar')

    <div class="h-24"></div>

    <div class = "mx-auto mt-8 p-6">
        <h1 class="text-3xl font-bold mb-4">Selamat datang di <span class="text-blue-600">Kos Pedia</span></h1>
        <p class="text-lg mb-2">Cari kos idaman kini tak perlu susah, Klik saja di sini, semuanya jadi mudah. Temukan
            tempat nyaman, buat hati senang, bersama kami, hidup jadi riang.</p>
        <p id="kos"class="text-lg mb-2">Selamat mencari kos yang pas, di sini semua jadi lebih bebas!</p>
    </div>
    <div
        class="grid gap-6 mt-8 overflow-hidden text-gray-700 shadow-md rounded-xl bg-clip-border sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @include('datakos.card')
    </div>


</body>

</html>
