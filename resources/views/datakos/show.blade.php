<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @include('components.navbar')

    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-wrap">
            <div class="w-full lg:w-1/2">
                <img src="{{ asset('photos/' . $datakos->foto) }}" alt="Datakos Photo"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="w-full lg:w-1/2 lg:pl-8 mt-6 lg:mt-0">
                <h1 class="text-2xl font-bold mb-4">KOS</h1>
                <p><strong>Nama:</strong> {{ $datakos->nama }}</p>
                <p><strong>Lokasi:</strong> {{ $datakos->lokasi }}</p>
                <p><strong>Harga:</strong> {{ $datakos->harga }}</p>
                <p><strong>Jumlah Kamar:</strong> {{ $datakos->jumlah_kamar }}</p>
                <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $datakos->status)) }}</p>
                <p class="overflow-wrap break-word"><strong>Deskripsi:</strong> {{ $datakos->deskripsi }}</p>
                <p><strong>No. Telepon:</strong> {{ $datakos->notlp }}</p>
                <a href="#">
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Pesan
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
