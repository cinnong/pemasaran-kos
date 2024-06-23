<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Data Pembayaran</h1>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr class="text-left">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Nama Pemesan</th>
                    <th class="py-2 px-4">Tanggal Pembayaran</th>
                    <th class="py-2 px-4">Status Pembayaran</th>
                    <th class="py-2 px-4">Bukti Pembayaran</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr class="border-t border-gray-200">
                        <td class="py-2 px-4">{{ $pembayaran->id }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->pemesanan->nama_penyewa }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->tanggal_pembayaran }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->status_pembayaran }}</td>
                        <td class="py-2 px-4">
                            @if ($pembayaran->upload_bukti_pembayaran)
                                <a href="{{ asset('storage/' . $pembayaran->upload_bukti_pembayaran) }}" target="_blank"
                                    class="text-blue-500 hover:underline">Lihat Bukti</a>
                            @else
                                Tidak ada bukti pembayaran
                            @endif
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{ route('pembayarans.show', $pembayaran->id) }}"
                                class="text-blue-500 hover:underline mr-2">Lihat</a>
                            <a href="{{ route('pembayarans.edit', $pembayaran->id) }}"
                                class="text-yellow-500 hover:underline mr-2">Edit</a>
                            <form action="{{ route('pembayarans.destroy', $pembayaran->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:underline focus:outline-none">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
