<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional custom styles */
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-xl w-full bg-white shadow-md rounded-lg p-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Upload Bukti Pembayaran</h1>
            <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pemesanan_id" value="{{ $pemesanan->id }}">
                <div class="mb-6">
                    <p class="text-lg text-gray-600 mb-2"><strong>Nomor Rekening:</strong>
                        {{ $pemesanan->datakos->nomor_rekening }}</p>
                    <label for="upload_bukti_pembayaran" class="block text-lg font-medium text-gray-700 mb-2">Pilih
                        Bukti
                        Pembayaran</label>
                    <input type="file" id="upload_bukti_pembayaran" name="upload_bukti_pembayaran"
                        class="mt-1 block w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Upload</button>
            </form>
            @if (session('success'))
                <div class="mt-8 bg-green-100 border-l-4 border-green-500 text-green-700 p-6 rounded-md">
                    <p class="font-bold mb-4">Selamat Datang di Kos {{ session('nama_kos') }}</p>
                    <p class="mb-4">{{ session('success') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('beranda') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Kembali</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
