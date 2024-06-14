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

            <div class="container mx-auto py-8">
                <div class="flex justify-between mb-4">
                    <h1 class="text-2xl font-bold text-black">Data Kosan</h1>
                    <a href="{{ route('datakos.create') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Kos</a>
                </div>
                <!-- List of datakos -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Nama</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Pemilik</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Lokasi</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Harga</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Jumlah Kamar</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Status</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Deskripsi</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">No Telepon</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Foto</th>
                                <th class="px-4 py-2 border-b border-gray-200 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datakos as $datakos)
                                <tr>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $datakos->nama }}</td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">
                                        {{ $datakos->datapemilik->nama ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $datakos->lokasi }}
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $datakos->harga }}
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">
                                        {{ $datakos->jumlah_kamar }}</td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $datakos->status }}
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">
                                        <div class="truncate w-40">{{ $datakos->deskripsi }}</div>
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $datakos->notlp }}
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-200 text-center">
                                        @if ($datakos->foto)
                                            <img src="{{ asset('photos/' . $datakos->foto) }}" alt="datakos Photo"
                                                class="w-24 h-auto">
                                        @endif
                                    </td>
                                    <td class="flex px-4 py-2 border-b border-gray-200 text-center">
                                        <a href="{{ route('beranda', $datakos->id) }}"
                                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">View</a>
                                        <a href="{{ route('datakos.edit', $datakos->id) }}"
                                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">Edit</a>
                                        <form action="{{ route('datakos.destroy', $datakos->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
