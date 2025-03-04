<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
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
                       <a href="pengajuanCuti"><button class="px-4 py-2 text-gray-600  hover:bg-gray-100 rounded ">Pengajuan Cuti</button></a>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row pt-4">
                    <!-- Foto -->
                    <div class="bg-gray-200 h-48 w-48 flex items-center justify-center mr-6 mb-4 md:mb-0">
                        <span>Foto</span>
                    </div>
    
                    <!-- Data Mahasiswa -->
                    
                    <div class=" w-full bg-gray-50 p-4 rounded">
                    <h3 class="font-bold">Data Mahasiswa</h3>
                    <table class="w-full mt-2 border border-collapse table-auto">
                        <tbody class="divide-y divide-gray-300">
                            <tr class="bg-gray-100"><td class="p-4 font-semibold w-3/4">NPM</td><td class="p-4 w-2/3">230102071</td></tr>
                            <tr class="bg-white"><td class="p-4 font-semibold">Nama</td><td class="p-4">Revano Augustofa</td></tr>
                            <tr class="bg-gray-100"><td class="p-4 font-semibold">Tempat/ Tgl Lahir</td><td class="p-4">-</td></tr>
                            <tr class="bg-white"><td class="p-4 font-semibold">Jenis Kelamin</td><td class="p-4">-</td></tr>
                            <tr class="bg-gray-100"><td class="p-4 font-semibold">Agama</td><td class="p-4">-</td></tr>
                            <tr class="bg-white"><td class="p-4 font-semibold">Tahun Akademik</td><td class="p-4">2023/2024</td></tr>
                            <tr class="bg-gray-100"><td class="p-4 font-semibold">Program Studi</td><td class="p-4">D3 Teknik Informatika</td></tr>
                            <tr class="bg-white"><td class="p-4 font-semibold">Jurusan</td><td class="p-4">Komputer dan Bisnis</td></tr>
                            <tr class="bg-gray-100"><td class="p-4 font-semibold">Semester</td><td class="p-4">4</td></tr>
                            <tr class="bg-white "><td class="p-4 font-semibold">Alamat</td><td class="p-4">-</td></tr>
                            <tr class="bg-gray-100"><td class="p-4 font-semibold">Email</td><td class="p-4">-</td></tr>
                            <tr class="bg-white"><td class="p-4 font-semibold">No Handphone</td><td class="p-4">-</td></tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
</x-layout>
</body>
</html>
