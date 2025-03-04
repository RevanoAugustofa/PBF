<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>SIP - Cuti</title>
</head>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
        <div class="flex-1 p-6">
            <div class="mt-4">
                <p class="text-gray-600">> Data Mahasiswa</p>
                <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
            </div>

            <div class="bg-white p-4 rounded shadow mt-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                       <button class="px-4 py-2 border-blue-500 border-b-4 font-semibold">Data Mahasiswa</button> 
                       <a href="pengajuanCuti"><button class="px-4 py-2 text-gray-600">Pengajuan Cuti</button></a>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row pt-4">
                    <!-- Foto -->
                    <div class="bg-gray-200 h-48 w-48 flex items-center justify-center mr-6 mb-4 md:mb-0">
                        <span>Foto</span>
                    </div>
    
                    <!-- Data Mahasiswa -->
                    <div class="bg-blue-100 p-4 rounded flex-1">
                        <h3 class="font-bold">Data Mahasiswa</h3>
                        <dl class="mt-2">
                            <div class="flex justify-between"><dt>Nomor Induk Kependudukan:</dt><dd>230102071</dd></div>
                            <div class="flex justify-between"><dt>NPM:</dt><dd>230102071</dd></div>
                            <div class="flex justify-between"><dt>Nama:</dt><dd>Revano Augustofa</dd></div>
                            <div class="flex justify-between"><dt>Tempat/ Tgl lahir:</dt><dd>-</dd></div>
                            <div class="flex justify-between"><dt>Jenis Kelamin:</dt><dd>-</dd></div>
                            <div class="flex justify-between"><dt>Agama:</dt><dd>-</dd></div>
                            <div class="flex justify-between"><dt>Angkatan:</dt><dd>D3 Teknik Informatika</dd></div>
                            <div class="flex justify-between"><dt>Program Studi:</dt><dd>Komputer dan Bisnis</dd></div>
                            <div class="flex justify-between"><dt>Jurusan:</dt><dd>4</dd></div>
                            <div class="flex justify-between"><dt>Semester:</dt><dd>2023/2024</dd></div>
                            <div class="flex justify-between"><dt>Alamat:</dt><dd>-</dd></div>
                            <div class="flex justify-between"><dt>Email:</dt><dd>-</dd></div>
                            <div class="flex justify-between"><dt>No Handphone:</dt><dd>-</dd></div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
</x-layout>
</body>
</html>
