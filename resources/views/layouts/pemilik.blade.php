<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kos-Pedia - Dashboard Pemilik Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('components.sidebarpemilik')

        <div class="flex-1 p-6 overflow-auto">
            @yield('content')
        </div>
    </div>
</body>

</html>
