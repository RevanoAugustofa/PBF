<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <aside class="w-64 bg-gray-700 text-white p-5 fixed h-full">
        <div class="text-center mb-4 flex items-center justify-center">
            <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-10 mr-1">
            <h2 class="text-2xl font-bold text-white">SiKRS</h2>
        </div>
        <hr>            
        <ul class="mt-5">
            <li class="py-2"><a href="#" class="block">Dashboard</a></li>
            <li class="py-2 relative">
                <button onclick="toggleDropdown()" class="block w-full text-left">Menu</button>
                <ul id="dropdownMenu" class="hidden bg-gray-600 mt-2 rounded">
                    <li class="py-2 px-4 hover:bg-gray-500"><a href="#">Data Mahasiswa</a></li>
                    <li class="py-2 px-4 hover:bg-gray-500"><a href="#">Data Dosen</a></li>
                    <li class="py-2 px-4 hover:bg-gray-500"><a href="#">Data Prodi</a></li>
                    <li class="py-2 px-4 hover:bg-gray-500"><a href="#">Data Matkul</a></li>
                    <li class="py-2 px-4 hover:bg-gray-500"><a href="#">Data Kelas</a></li>
                    <li class="py-2 px-4 hover:bg-gray-500"><a href="#">Data KRS</a></li>
                </ul>
            </li>
            <li class="py-2 text-red-400"><a href="#" class="block">Log Out</a></li>
        </ul>
    </aside>
</body>
</html>




