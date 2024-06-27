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

    <div class="mx-auto mt-8 p-6 max-w-7xl">
        <h1 class="text-3xl font-bold mb-4">Selamat datang di <span class="text-blue-600">Kos Pedia</span></h1>
        <p class="text-lg mb-2">Cari kos idaman kini tak perlu susah, Klik saja di sini, semuanya jadi mudah. Temukan
            tempat nyaman, buat hati senang, bersama kami, hidup jadi riang.</p>
        <p id="kos" class="text-lg mb-2">Selamat mencari kos yang pas, di sini semua jadi lebih bebas!</p>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 mt-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @if ($results->isEmpty())
                <h1 class="col-span-full text-center text-gray-700" style="font-size: 50px">Tidak ada kos yang sesuai.</h1>
            @else
                @foreach ($results as $result)
                    <div class="relative overflow-hidden bg-gray-50 rounded-xl shadow-xl ring-gray-900/5">
                        <a href="{{ route('datakos.show', $result->id) }}">
                            <div class="relative inset-0 bg-center dark:bg-black"></div>
                            <div
                                class="group relative flex h-full rounded-xl border border-gray-200 transition duration-300 ease-in-out group-hover:border-gray-700 dark:border-gray-700">
                                <img src="{{ asset('photos/kos/' . $result->foto) }}"
                                    class="block w-full h-48 object-cover transition duration-300 transform scale-100 group-hover:scale-110"
                                    alt="{{ $result->nama }}" />
                                <div
                                    class="absolute bottom-0 p-4 text-gray-100 group-hover:text-blue-700 transition duration-300 ease-in-out transform translate-y-0 translate-x-0 group-hover:-translate-y-1 group-hover:translate-x-3">
                                    <h1 class="text-2xl font-bold">{{ $result->nama }}</h1>
                                    <p class="text-sm font-bold">{{ $result->lokasi }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
