<div class="container mx-auto py-8">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Properties</h1>
        <a href="{{ route('properties.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add
            Property</a>
    </div>
    <!-- List of properties -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b border-gray-200 text-left">Nama</th>
                    <th class="px-4 py-2 border-b border-gray-200 text-left">Lokasi</th>
                    <th class="px-4 py-2 border-b border-gray-200 text-left">Harga</th>
                    <th class="px-4 py-2 border-b border-gray-200 text-left">Status</th>
                    <th class="px-4 py-2 border-b border-gray-200 text-left">Deskripsi</th>
                    <th class="px-4 py-2 border-b border-gray-200 text-left">Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $property->nama }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $property->lokasi }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $property->harga }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $property->status }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $property->deskripsi }}</td>
                        <td class="px-4 py-2 border-b border-gray-200">
                            @if ($property->foto)
                                <img src="{{ asset('photos/' . $property->foto) }}" alt="Property Photo"
                                    class="w-24 h-auto">
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
