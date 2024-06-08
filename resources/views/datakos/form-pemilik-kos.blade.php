<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemilik Kosan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Tambah Pemilik Kosan</h1>
        <form action="{{ route('datapemilik.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700">Alamat:</label>
                <input type="text" id="alamat" name="alamat" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="notlp" class="block text-gray-700">No Telepon:</label>
                <input type="text" id="notlp" name="notlp" class="w-full px-4 py-2 border rounded"
                    required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</body>

</html>
