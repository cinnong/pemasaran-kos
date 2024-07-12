@extends('layouts.pemilik')

@section('content')
    <div class="container mx-auto py-6 px-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl text-center font-bold mb-6 text-gray-800">Data Pemesanan</h2>
        <div class="overflow-x-auto overflow-y-auto relative">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">No</th>
                        <th class="py-3 px-6 text-center">Nama Pemesan</th>
                        <th class="py-3 px-6 text-center">Tgl Pemesanan</th>
                        <th class="py-3 px-6 text-center">Tgl Masuk</th>
                        <th class="py-3 px-6 text-center">Tgl Keluar</th>
                        <th class="py-3 px-6 text-center">Tipe Kos</th>
                        <th class="py-3 px-6 text-center">Per Bulan</th>
                        <th class="py-3 px-6 text-center">Harga</th>
                        <th class="py-3 px-6 text-center">Total Biaya</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                        <th class="py-3 px-6 text-center">Cetak</th>
                    </tr>
                </thead>
                <tbody class="text-black text-sm font-dark">
                    @foreach ($pesananKos as $pemesanan)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->user->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tanggal_masuk }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tanggal_keluar }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->tipe_kos }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->per_bulan }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->harga }}</td>
                            <td class="py-3 px-6 text-center">{{ $pemesanan->total_biaya }}</td>
                            <td class="py-3 px-6 text-center">
                                <form action="{{ route('pemesanans.update', ['pemesanan' => $pemesanan]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <select class="form-control rounded-lg border-gray-200" name="aksi" required>
                                            <option value="Setuju" {{ $pemesanan->aksi == 'Setuju' ? 'selected' : '' }}>
                                                Setuju</option>
                                            <option value="Tidak setuju"
                                                {{ $pemesanan->aksi == 'Tidak setuju' ? 'selected' : '' }}>Tidak setuju
                                            </option>
                                            <option value="Pending" {{ $pemesanan->aksi == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                        </select>
                                    </div>
                                    <button type="submit"
                                        class="btn bg-blue-500 text-white rounded-lg px-4 py-2 mt-2 hover:bg-blue-600 transition duration-200">Simpan</button>
                                </form>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <button
                                    onclick="printPemesanan('{{ $pemesanan->user->name }}', '{{ $pemesanan->tanggal_pemesanan }}', '{{ $pemesanan->tanggal_masuk }}', '{{ $pemesanan->tanggal_keluar }}', '{{ $pemesanan->tipe_kos }}', '{{ $pemesanan->per_bulan }}', '{{ $pemesanan->harga }}', '{{ $pemesanan->total_biaya }}', '{{ $pemesanan->datakos->nama }}', '{{ $pemesanan->pemilikkos->nama }}')"
                                    class="btn bg-green-500 text-white rounded-lg px-4 py-2 hover:bg-green-600 transition duration-200">Cetak</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function printPemesanan(nama, tglPemesanan, tglMasuk, tglKeluar, tipeKos, perBulan, harga, totalBiaya, namaKos,
            namaPemilik) {
            // Hitung ukuran jendela cetak
            const width = 800; // Sesuaikan dengan lebar maksimum data
            const height = 600; // Sesuaikan dengan tinggi maksimum data

            const printWindow = window.open('', '', `width=${width},height=${height}`);
            printWindow.document.write('<html><head><title>Print Pemesanan</title>');
            printWindow.document.write('<style>');
            printWindow.document.write(`
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                    font-size: 20px; /* Ukuran font utama */
                    line-height: 1.6; /* Jarak antar baris */
                }
                .container {
                    width: 100%;
                    max-width: 600px; /* Atur lebar maksimum sesuai kebutuhan */
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #000;
                    border-radius: 10px;
                }
                .center {
                    text-align: center;
                    margin-bottom: 20px;
                    font-size: 24px; /* Ukuran font untuk judul */
                    font-weight: bold;
                }
                .info {
                    margin-bottom: 15px;
                    font-size: 20px; /* Ukuran font untuk informasi */
                }
                .info p {
                    margin: 10px 0; /* Jarak antar paragraf */
                }
                .total {
                    font-weight: bold;
                    margin-top: 15px;
                    border-top: 1px solid #000;
                    padding-top: 10px;
                }
            `);
            printWindow.document.write('</style></head><body>');
            printWindow.document.write('<div class="container">');
            printWindow.document.write('<h2 class="center">' + namaKos + '</h2>');
            printWindow.document.write('<div class="info">');
            printWindow.document.write('<p><strong>Nama Pemesan:</strong> ' + nama + '</p>');
            printWindow.document.write('<p><strong>Nama Pemilik Kos:</strong> ' + namaPemilik + '</p>');
            printWindow.document.write('<p><strong>Tanggal Pemesanan:</strong> ' + tglPemesanan + '</p>');
            printWindow.document.write('<p><strong>Tanggal Masuk:</strong> ' + tglMasuk + '</p>');
            printWindow.document.write('<p><strong>Tanggal Keluar:</strong> ' + tglKeluar + '</p>');
            printWindow.document.write('<p><strong>Tipe Kos:</strong> ' + tipeKos + '</p>');
            printWindow.document.write('<p><strong>Per Bulan:</strong> ' + perBulan + '</p>');
            printWindow.document.write('<p><strong>Harga:</strong> ' + harga + '</p>');
            printWindow.document.write('</div>');
            printWindow.document.write('<div class="total"><p><strong>Total Biaya:</strong> ' + totalBiaya + '</p></div>');
            printWindow.document.write('</div></body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
