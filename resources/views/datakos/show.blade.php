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
    <div class="container mx-auto py-8 mt-8">
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-wrap">
            <div class="w-full lg:w-1/2">
                <img src="{{ asset('photos/kos/' . $datakos->foto) }}" alt="Foto Kos"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="w-full lg:w-1/2 lg:pl-8 mt-6 lg:mt-0">
                {{-- <h1 class="text-3xl font-bold mb-4">KOS</h1> --}}
                <p class="text-xl"><strong>Nama:</strong> {{ $datakos->nama }}</p>
                <p class="text-xl"><strong>Lokasi:</strong> {{ $datakos->lokasi }}</p>
                <p class="text-xl"><strong>Harga:</strong> {{ $datakos->harga }}</p>
                <p class="text-xl"><strong>Jumlah Kamar:</strong> {{ $datakos->jumlah_kamar }}</p>
                <p class="text-xl"><strong>Kamar Terisi:</strong> {{ $kamarTerisi }}</p>
                <p class="text-xl"><strong>Tipe Kos:</strong> {{ ucfirst(str_replace('_', ' ', $datakos->tipekos)) }}
                </p>
                <p class="text-xl overflow-wrap break-word"><strong>Deskripsi:</strong> {{ $datakos->deskripsi }}</p>
                <p class="text-xl"><strong>No. Telepon:</strong> {{ $datakos->notlp }}</p>
                <a href="{{ route('beranda') }}">
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xl">
                        Back
                    </button>
                </a>
                <a href="tel:{{ $datakos->notlp }}">
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xl">
                        Hubungi Pemilik
                    </button>
                </a>
                <a href="{{ route('pemesanan.pesan', ['datakos_id' => $datakos->id]) }}" target="_blank">
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xl">
                        Pesan
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
