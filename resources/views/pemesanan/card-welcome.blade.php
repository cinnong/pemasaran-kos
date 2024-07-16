<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-500 p-4">
                <h1 class="text-3xl font-bold text-white text-center">Selamat Datang 🤗</h1>
            </div>
            <div class="p-6">
                <p class="text-lg text-gray-700 text-center mb-4">Kami sangat senang menyambut Anda di kos kami!</p>
                <div class="flex justify-center">
                    <a href="{{ route('beranda') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out text-lg">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
