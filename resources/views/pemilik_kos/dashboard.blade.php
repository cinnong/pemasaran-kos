<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Pemilik Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold my-4">Dashboard Pemilik Kos</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($datakos as $kos)
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold">{{ $kos->nama }}</h2>
                <p class="text-gray-600">Lokasi: {{ $kos->lokasi }}</p>
                <p class="text-gray-600">Harga: {{ $kos->harga }}</p>
                <p class="text-gray-600">Jumlah Kamar: {{ $kos->jumlah_kamar }}</p>
                <p class="text-gray-600">Deskripsi: {{ $kos->deskripsi }}</p>
                <p class="text-gray-600">Nama Pemilik: {{ $kos->datapemilik->nama }}</p>
                <p class="text-gray-600">No Telepon: {{ $kos->notlp }}</p>
                <!-- Tambahkan kode untuk menampilkan foto jika ada -->
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
