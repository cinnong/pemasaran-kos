<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pemilik Kosan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>

<body>
    @include('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Edit Pemilik Kosan</h1>
                <form action="{{ route('datapemilik.update', $datapemilik->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ $datapemilik->nama }}"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ $datapemilik->alamat }}"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="notlp" class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <input type="text" id="notlp" name="notlp" value="{{ $datapemilik->notlp }}"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ $datapemilik->email }}"
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
