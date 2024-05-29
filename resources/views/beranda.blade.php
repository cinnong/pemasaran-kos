<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>
    @include('components.navbar')

    <div
        class="grid gap-6 mt-8 overflow-hidden text-gray-700 shadow-md rounded-xl bg-clip-border sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> 
        @include('properties.card')
    </div>

    <div id="map" style="height: 400px;"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13); // Inisialisasi peta dengan koordinat dan zoom level
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); // Tambahkan layer tile
        // Tambahkan marker, polyline, atau fitur lainnya sesuai kebutuhan
    </script>
</body>

</html>
