<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional custom styles */
        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="form-container bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4 text-center">Pesan Kos</h1>
            @auth
                <form action="{{ route('pemesanans.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="tanggal_pemesanan" value="{{ now() }}">
                    <input type="hidden" name="tipe_kos" value="{{ $datakos->tipekos }}">
                    <input type="hidden" name="harga" value="{{ $datakos->harga }}">
                    <input type="hidden" name="id_kos" value="{{ $datakos->id }}">
                    <input type="hidden" name="pemilik_kos_id" value="{{ $datakos->pemilik_kos_id }}">
                    <input type="hidden" name="total_biaya" id="total_biaya" value="{{ $datakos->harga }}">

                    <div class="mb-4">
                        <label for="tanggal_masuk" class="block text-lg font-medium text-gray-700">Tanggal Masuk</label>
                        <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            onchange="updatePerBulan()">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_keluar" class="block text-lg font-medium text-gray-700">Tanggal Keluar</label>
                        <input type="date" id="tanggal_keluar" name="tanggal_keluar"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            onchange="updatePerBulan()">
                    </div>

                    <div class="mb-4">
                        <label for="per_bulan" class="block text-lg font-medium text-gray-700">Lama Sewa (Bulan)</label>
                        <input type="number" id="per_bulan" name="per_bulan"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block text-lg font-medium text-gray-700">Harga Per Bulan</label>
                        <input type="text" name="harga" value="{{ $datakos->harga }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            readonly>
                    </div>
                    <div class="mb-4">
                        <label for="total_biaya_label" class="block text-lg font-medium text-gray-700">Total Biaya</label>
                        <input type="text" id="total_biaya_label" name="total_biaya_label"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ $datakos->harga }}" readonly>
                    </div>

                    <script>
                        function updatePerBulan() {
                            const tanggalMasuk = document.getElementById('tanggal_masuk').value;
                            const tanggalKeluar = document.getElementById('tanggal_keluar').value;

                            if (tanggalMasuk && tanggalKeluar) {
                                const startDate = new Date(tanggalMasuk);
                                const endDate = new Date(tanggalKeluar);

                                let totalMonths = (endDate.getFullYear() - startDate.getFullYear()) * 12;
                                totalMonths += endDate.getMonth() - startDate.getMonth();

                                // Menghitung perbedaan hari
                                const daysDifference = endDate.getDate() - startDate.getDate();

                                // Jika endDate's day is not less than startDate's day, tambah 1 bulan
                                if (daysDifference >= 0) {
                                    totalMonths++;
                                }

                                document.getElementById('per_bulan').value = totalMonths;

                                updateTotalBiaya();
                            }
                        }

                        function updateTotalBiaya() {
                            const harga = parseFloat(document.querySelector('input[name="harga"]').value);
                            const perBulan = parseInt(document.querySelector('input[name="per_bulan"]').value);
                            const totalBiaya = harga * perBulan;
                            document.getElementById('total_biaya').value = totalBiaya;
                            document.getElementById('total_biaya_label').value = totalBiaya;
                        }
                    </script>

                    <button type="submit"
                        class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block mx-auto">Pesan</button>
                </form>
            @else
                <p class="text-center">Silakan <a href="{{ route('login') }}" class="text-blue-500">login</a> terlebih
                    dahulu untuk melakukan pemesanan.</p>
            @endauth
        </div>
    </div>

</body>

</html>
