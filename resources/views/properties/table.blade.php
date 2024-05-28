<div class="container mx-auto py-8">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Properties</h1>
        <a href="{{ route('properties.create') }}"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Property</a>
    </div>
    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-white">
            <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Location</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr class="text-gray-700">
                    <td class="px-4 py-3">{{ $property->id }}</td>
                    <td class="px-4 py-3">{{ $property->nama }}</td>
                    <td class="px-4 py-3">{{ $property->lokasi }}</td>
                    <td class="px-4 py-3">{{ $property->harga }}</td>
                    <td class="px-4 py-3">{{ $property->status }}</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('properties.show', $property->id) }}"
                            class="text-blue-600 hover:underline mr-2">View</a>
                        <a href="{{ route('properties.edit', $property->id) }}"
                            class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
