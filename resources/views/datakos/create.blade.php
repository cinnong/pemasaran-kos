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
                    <select
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        id="datapemilik_id" name="datapemilik_id" required onchange="fillPhoneNumber()">
                        @foreach ($pemilik_kos as $pemilik)
                            <option value="{{ $pemilik->id }}" data-nohp="{{ $pemilik->no_hp }}">{{ $pemilik->nama }}</option>
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
                    <label for="tipekos" class="block text-gray-700">Tipe Kos</label>
                    <select
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        name="tipekos" id="tipekos" required>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                        <option value="campuran">Campuran</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                    <textarea
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        name="deskripsi" id="deskripsi" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="notlp" class="block text-gray-700">Nomor Telepon</label>
                    <input type="text"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           name="notlp" id="notlp" required readonly>
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

<script>
    // Initial call to fillPhoneNumber() to set default phone number based on initial selection
    fillPhoneNumber();

    function fillPhoneNumber() {
        var select = document.getElementById('datapemilik_id');
        var selectedOption = select.options[select.selectedIndex];
        var nohp = selectedOption.getAttribute('data-nohp');
        document.getElementById('notlp').value = nohp;
    }
</script>

</body>

</html>
