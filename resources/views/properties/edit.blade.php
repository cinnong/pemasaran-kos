<!-- resources/views/properties/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Edit Property</h2>
            <form action="{{ route('properties.update', $property->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" name="nama" id="nama" value="{{ $property->nama }}" class="w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="lokasi" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ $property->lokasi }}" class="w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                    <input type="number" name="harga" id="harga" value="{{ $property->harga }}" class="w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status" class="w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="available" {{ $property->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="occupied" {{ $property->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                        <option value="under_maintenance" {{ $property->status == 'under_maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">{{ $property->deskripsi }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
