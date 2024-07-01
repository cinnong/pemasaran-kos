<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Upload Bukti Pembayaran</h1>
            <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pemesanan_id" value="{{ $pemesanan->id }}">
                <div class="mb-4">
                    <p>Nomor Rekening: {{ $pemesanan->datakos->nomor_rekening }}</p>
                    <label for="upload_bukti_pembayaran" class="block text-sm font-medium text-gray-700">Upload Bukti
                        Pembayaran</label>
                    <input type="file" id="upload_bukti_pembayaran" name="upload_bukti_pembayaran"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
            </form>
        </div>
    </div>
</body>

</html>
