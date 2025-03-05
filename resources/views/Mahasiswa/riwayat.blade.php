<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
    <!-- Content -->
    <div class="flex-1 p-6">
        <div class="mt-4">
            <p class="text-gray-600">> Timeline Pengajuan</p>
            <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
        </div>
        
        {{-- <div class="border-b-2 border-blue-500 mt-4 mb-6"></div> --}}
        <!-- Tabs -->
        <div class="bg-white p-4 rounded shadow mt-4">
            <div class="flex justify-between items-center border-b pb-2">
                <div class="flex space-x-4">
                   <a href="dashboard_mhs"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded ">Data Mahasiswa</button></a> 
                   <a href="pengajuanCuti"><button class="px-4 py-2  text-gray-600 hover:bg-gray-100 rounded  ">Pengajuan Cuti</button></a>
                   <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Timeline Pengajuan</button>
                </div>
            </div>
        <!-- Data Mahasiswa -->
        <div class="mt-4 p-4 bg-blue-100 rounded">
            <div class="grid grid-cols-2 gap-4">
                <p><strong>NPM:</strong> 230102071</p>
                <p><strong>Jurusan:</strong> Komputer dan Bisnis</p>
                <p><strong>Nama:</strong> Revano Augustofa</p>
                <p><strong>Semester:</strong> 4</p>
                <p><strong>Program Studi:</strong> D3 Teknik Informatika</p>
                <p><strong>Tahun Akademik:</strong> 2023/2024</p>
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