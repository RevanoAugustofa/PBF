<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <p class="text-sm text-gray-500">> Pengajuan Cuti > Form Cuti Mahasiswa</p>
            <h2 class="text-2xl font-bold mt-2">Mahasiswa <span class="text-gray-500">Riwayat berhenti studi mahasiswa.</span></h2>
            
            <div class="bg-white shadow-md rounded p-4 mt-4">
                <!-- Tab Menu -->
                <div class="border-b flex space-x-4">
                    <a href="#" class="pb-2 border-b-2 border-cyan-700 font-semibold">Data Mahasiswa</a>
                    <a href="#" class="pb-2 text-gray-500">Pengajuan Cuti</a>
                </div>
                
                <!-- Data Mahasiswa -->
                <div class="grid grid-cols-2 bg-blue-50 p-4 mt-3 rounded">
                    <p><strong>NPM:</strong> 230102071</p>
                    <p><strong>Jurusan:</strong> Komputer dan Bisnis</p>
                    <p><strong>Nama:</strong> Revano Augustofa</p>
                    <p><strong>Semester:</strong> 4</p>
                    <p><strong>Program Studi:</strong> D3 Teknik Informatika</p>
                    <p><strong>Angkatan:</strong> 2023/2024</p>
                </div>
            </div>

            <!-- Form Cuti -->
            <div class="bg-white shadow-md rounded p-6 mt-4 border border-red-400">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold">Periode*</label>
                        <select class="border p-2 w-full rounded">
                            <option>20232</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Dokumen Pendukung</label>
                        <input type="file" class="border p-2 w-full rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Status Studi Yang Diajukan</label>
                        <select class="border p-2 w-full rounded">
                            <option>Cuti</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700 font-semibold">Alasan Berhenti*</label>
                        <textarea class="border p-2 w-full rounded"></textarea>
                    </div>
                </div>
            </div>
        
            <!-- Action Buttons -->
            <div class="flex justify-end mt-4 space-x-2">
                <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded">⬅ Kembali</button>
                <button class="px-4 py-2 bg-green-500 text-white rounded">✔ Simpan</button>
            </div>
        </main>
    </x-layout>
</body>
</html>