<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP - Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <script src="js/script.js" defer></script>  <!-- Tambahkan script.js -->
</head>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            
            <div class="mt-4">
                <p class="text-gray-600">> Pengajuan Cuti</p>
                <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
            </div>

            <div class="bg-white p-4 rounded shadow mt-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                       <a href="dashboard_mhs"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded ">Data Mahasiswa</button></a> 
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Pengajuan Cuti</button>
                        <a href="riwayat"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded ">Timeline Pengajuan</button></a>
                    </div>
                    <a href="formCuti"><button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">+ Tambah</button></a>
                </div>
                
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
                
                <div class="mt-4">
                    <table class="w-full border border-collapse">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Tahun Akademik</th>
                                <th class="border px-4 py-2">Status Yang Diajukan</th>
                                <th class="border px-4 py-2">Status Akademik</th>
                                <th class="border px-4 py-2">Tgl Pengajuan</th>
                                <th class="border px-4 py-2">Status Pengajuan</th>
                                <th class="border px-4 py-2">Tagihan</th>
                                <th class="border px-4 py-2">Dibatalkan</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="9">Data kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>
</html>

    </x-layout>
</html>
