<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">Tambahkan Kos</h2>
                <form action="{{ route('datakos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama</label>
                        <input type="text"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="nama" id="nama" required>
                    </div>
                    <div class="mb-4">
                        <label for="datapemilik_id">Pemilik:</label>
                        <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="datapemilik_id" name="datapemilik_id" required>
                            @foreach($datapemilik as $pemilik)
                                <option value="{{ $pemilik->id }}">{{ $pemilik->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="lokasi" class="block text-gray-700">Lokasi</label>
                        <input type="text"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="lokasi" id="lokasi" required>
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700">Harga</label>
                        <input type="number"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="harga" id="harga" required>
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_kamar" class="block text-gray-700">Jumlah Kamar</label>
                        <input type="number"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="jumlah_kamar" id="jumlah_kamar" required>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700">Status</label>
                        <select
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="status" id="status" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="terisi">Terisi</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                        <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="notlp" class="block text-gray-700">No Telepon</label>
                        <input type="text"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="notlp" id="notlp" required>
                    </div>
                    <div class="mb-4">
                        <label for="foto" class="block text-gray-700">Photo</label>
                        <input type="file"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="foto" id="foto" required>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
