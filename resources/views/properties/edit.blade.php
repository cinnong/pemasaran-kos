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
                <form action="{{ route('properties.update', $property->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ $property->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi"
                            value="{{ $property->lokasi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            value="{{ $property->harga }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="available" {{ $property->status == 'available' ? 'selected' : '' }}>Available
                            </option>
                            <option value="occupied" {{ $property->status == 'occupied' ? 'selected' : '' }}>Occupied
                            </option>
                            <option value="under_maintenance"
                                {{ $property->status == 'under_maintenance' ? 'selected' : '' }}>Under Maintenance
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ $property->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Photo</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
