<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('properties.table')
            <div id="map" style="height: 400px;"></div>

        </div>
    </div>
    
    <script>
        function initMap() {
            // Inisialisasi peta
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });
            // Tambahkan marker, polylines, atau fitur lainnya sesuai kebutuhan
        }
    </script>
</x-app-layout>
