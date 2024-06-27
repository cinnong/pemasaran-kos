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
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Status Pemesanan</h1>
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                    <p class="font-bold">Menunggu Persetujuan</p>
                    <p>Pemesanan Anda sedang menunggu persetujuan dari pemilik kos.</p>
                </div>
            </div>
        </div>
    @elseif ($pemesanan->aksi === 'Setuju')
        {{-- Pemesanan Telah Disetujui --}}
        <div class="container mx-auto py-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Pemesanan Telah Disetujui</h1>
                <p class="mb-4">Pemesanan Anda telah disetujui. Silahkan lanjut ke halaman berikutnya.</p>
                <a href="{{ route('upload.bukti', $pemesanan->id) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    target="_blank">Lanjut</a>
            </div>
        </div>
    @elseif ($pemesanan->aksi === 'Tidak setuju')
        {{-- Pemesanan Ditolak --}}
        <div class="container mx-auto py-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Pemesanan Ditolak</h1>
                <p class="mb-4">Maaf, pemesanan Anda tidak disetujui oleh pemilik kos.</p>
                <a href="{{ route('beranda') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
            </div>
        </div>
    @else
        <div class="container mx-auto py-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Pemesanan</h1>
                <p>Tidak ada pesanan</p>
            </div>
        </div>
    @endif

</body>

</html>
