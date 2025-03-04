<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP - Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="js/script.js" defer></script>  <!-- Tambahkan script.js -->
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-teal-700 text-white p-4 flex justify-between items-center">
        <div class="text-lg font-bold">SIP - Cuti</div>
        <div class="flex items-center">
            <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full mr-2">
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-teal-700 text-white p-5 min-h-screen">
            <div class="flex items-center mb-8">
                <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
                <div>
                    <h2 class="font-bold">REVANO AUGUSTOFA</h2>
                    <p class="text-sm bg-gray-500 px-2 py-1 rounded inline-block">230102071</p>
                </div>
            </div>
            <nav>
                <a href="dashboard.blade.php" onclick="loadPage('dashboard.blade.php')" class="block py-2 px-4 bg-teal-500 rounded">Dashboard</a>
                <a href="#" onclick="loadPage('cuti.html')" class="block py-2 px-4 hover:bg-gray-300 rounded mt-2">Pengajuan Cuti</a>
            </nav>
        </div>
        
        <!-- Konten Berubah -->
        <div id="content" class="flex-1 p-6">
            <h2 class="text-xl font-bold">Selamat Datang!</h2>
            <p>Pilih menu di samping untuk navigasi.</p>
        </div>
    </div>

</body>
</html>
