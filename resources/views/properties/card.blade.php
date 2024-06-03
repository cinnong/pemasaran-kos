@foreach ($properties as $property)
    <div class="relative overflow-hidden bg-gray-50 mb-8 rounded-xl shadow-xl ring-gray-900/5">
        <a href="/pembooking/form/{{ $property->id }}">
            <div class="relative inset-0 bg-center dark:bg-black"></div>
            <div
                class="group relative flex h-full rounded-xl border border-gray-200 transition duration-300 ease-in-out group-hover:border-gray-700 dark:border-gray-700">
                <img src="{{ asset('photos/' . $property->foto) }}"
                    class="block w-full h-full object-cover transition duration-300 transform scale-100 group-hover:scale-110"
                    alt="{{ $property->nama }}" />
                <div
                    class="absolute bottom-0 p-4 text-slate-800 transition duration-300 ease-in-out transform translate-y-0 translate-x-0 group-hover:-translate-y-1 group-hover:translate-x-3">
                    <h1 class="text-2xl font-bold">{{ $property->nama }}</h1>
                    <p class="text-sm font-bold">{{ $property->deskripsi }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach
