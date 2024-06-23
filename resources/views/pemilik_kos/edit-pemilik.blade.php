<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pemilik Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>

<body>
    @include('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Edit Pemilik Kos</h1>
                <form action="{{ route('pemilik_kos.update', $pemilikKos->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ $pemilikKos->nama }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ $pemilikKos->no_hp }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ $pemilikKos->email }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
