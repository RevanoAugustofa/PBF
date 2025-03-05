<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
    <!-- Content -->
    <div class="flex-1 p-6">
        <div class="mt-4">
            <p class="text-gray-600">> Pengajuan Cuti</p>
            <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
        </div>
        
        <div class="border-b-2 border-blue-500 mt-4 mb-6"></div>
        <!-- Tabs -->
        <div class="bg-white p-4 rounded shadow mt-4">
        <div class="flex space-x-5 border-b">
            <a href="dashboard_mhs"><button class="py-2 px-3 text-gray-600">Data Mahasiswa</button></a>
            <a href="pengajuanCuti"><button class="py-2 px-3 text-gray-600">Pengajuan Cuti</button></a>
            <button class="py-2 px-3 border-b-4 border-blue-500 font-semibold">Timeline Pengajuan</button>
        </div>
        <!-- Data Mahasiswa -->
        <div class="bg-gray-100 p-4 rounded mt-5">
            <div class="grid grid-cols-2 text-sm">
                <p><strong>NPM</strong><br>230102071</p>
                <p><strong>Jurusan</strong><br>Komputer dan Bisnis</p>
                <p><strong>Nama</strong><br>Revano Augustofa</p>
                <p><strong>Semester</strong><br>4</p>
                <p><strong>Program Studi</strong><br>D3 Teknik Informatika</p>
                <p><strong>Angkatan</strong><br>2023/2024</p>
            </div>
        </div>
        <!-- Timeline -->
        <div class="mt-8 flex items-center justify-between">
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                <p class="text-sm mt-2">Pengajuan Cuti</p>
                <p class="text-xs">10.00 tgl/tahun</p>
            </div>
            <div class="w-full h-1 bg-gray-300"></div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                <p class="text-sm mt-2">Konfirmasi Dosen Wali</p>
                <p class="text-xs">10.00 WIB</p>
            </div>
            <div class="w-full h-1 bg-gray-300"></div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                <p class="text-sm mt-2">Konfirmasi Bag. Perpus</p>
                <p class="text-xs">10.00 WIB</p>
            </div>
            <div class="w-full h-1 bg-gray-300"></div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                <p class="text-sm mt-2">Konfirmasi Jurusan</p>
                <p class="text-xs">10.00 WIB</p>
            </div>
            <div class="w-full h-1 bg-gray-300"></div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                <p class="text-sm mt-2">Konfirmasi Baup</p>
                <p class="text-xs">10.00 WIB</p>
            </div>
        </div>
        </div>
    </div>
</x-layout>
</body>
</html>