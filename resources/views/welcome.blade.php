<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>SIP - Cuti</title>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <div class="text-lg font-bold">SIP - Cuti</div>
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
            {{-- <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full mr-2"> --}}
            <span>Revano Augustofa</span>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-[100px] bg-white text-white p-5 min-h-screen">
            <div class="flex items-center mb-8  text-black">
                <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
                <div>
                    <h2 class="font-bold">REVANO AUGUSTOFA</h2>
                    <p class="text-sm bg-gray-300 rounded px-2 inline-block">2301022071</p>
                </div>
            </div>
            <nav>
                <a href="#" class="block py-2 px-4 bg-blue-500 rounded">Dashboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-300 text-black rounded mt-2">Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="mb-4">
                <h1 class="text-2xl font-bold">Mahasiswa</h1>
                <h2 class="text-gray-600">Riwayat berhenti studi mahasiswa.</h2>
            </header>

            <ul class="flex border-b">
                <li class="mr-6"><a href="#" class="text-blue-600 border-b-2 border-blue-600 py-2">Data Mahasiswa</a></li>
                <li class="mr-6"><a href="home.blade.php" class="py-2">Pengajuan Cuti</a></li>
            </ul>

            <div class="bg-white shadow-md rounded p-4 mt-4">
                <div class="flex flex-col md:flex-row">
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
    </div>
</body>
</html>
