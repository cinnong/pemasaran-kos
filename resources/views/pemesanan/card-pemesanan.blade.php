<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Persetujuan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    @if ($pemesanan->aksi === 'Pending')
        {{-- Menunggu Persetujuan --}}
        <div class="container mx-auto py-8">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6">
                    <h1 class="text-3xl font-bold text-yellow-700 mb-4">Status Pemesanan</h1>
                    <p class="text-lg text-yellow-700 mb-4">Pemesanan Anda sedang menunggu persetujuan dari pemilik kos.
                    </p>
                </div>
            </div>
        </div>
    @elseif ($pemesanan->aksi === 'Setuju')
        {{-- Pemesanan Telah Disetujui --}}
        <div class="container mx-auto py-8">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4 text-blue-600">Pemesanan Telah Disetujui</h1>
                    <p class="text-lg text-gray-700 mb-4">Pemesanan Anda telah disetujui. Silahkan lanjut ke halaman
                        berikutnya.
                    </p>
                    <a href="{{ route('upload.bukti', $pemesanan->id) }}"
                        class="block w-full text-center bg-blue-700 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded">Lanjut</a>
                </div>
            </div>
        </div>
    @elseif ($pemesanan->aksi === 'Tidak setuju')
        {{-- Pemesanan Ditolak --}}
        <div class="container mx-auto py-8">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4 text-red-600">Pemesanan Ditolak</h1>
                    <p class="text-lg text-gray-700 mb-4">Maaf, pemesanan Anda tidak disetujui oleh pemilik kos.</p>
                    <a href="{{ route('beranda') }}"
                        class="block w-full text-center bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded">Kembali</a>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto py-8">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4">Pemesanan</h1>
                    <p class="text-lg text-gray-700">Tidak ada pesanan saat ini.</p>
                </div>
            </div>
        </div>
    @endif

</body>

</html>
