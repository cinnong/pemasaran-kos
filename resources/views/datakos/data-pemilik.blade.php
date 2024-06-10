<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</head>

<body>
    @include('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Daftar Pemilik Kosan</h1>
                <a href="{{ route('datakos.form-pemilik-kos') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pemilik Kosan</a>
                <table class="min-w-full bg-white mt-4">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200">Nama</th>
                            <th class="py-2 px-4 bg-gray-200">Alamat</th>
                            <th class="py-2 px-4 bg-gray-200">No Telepon</th>
                            <th class="py-2 px-4 bg-gray-200">Email</th>
                            <th class="py-2 px-4 bg-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapemilik as $pemilik)
                            <tr>
                                <td class="border px-4 py-2">{{ $pemilik->nama }}</td>
                                <td class="border px-4 py-2">{{ $pemilik->alamat }}</td>
                                <td class="border px-4 py-2">{{ $pemilik->notlp }}</td>
                                <td class="border px-4 py-2">{{ $pemilik->email }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('datapemilik.edit', $pemilik->id) }}"
                                        class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                    <form action="{{ route('datapemilik.destroy', $pemilik->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
