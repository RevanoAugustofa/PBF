<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIP - Cuti</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen w-screen">
  <!-- Header -->
 

  <!-- Container Layout -->
  <div class="flex h-[calc(100%-4rem)]">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-300">
        <div class="text-xl text-center bg-blue-400 p-[30px] font-bold">SIP - Cuti</div>
      <!-- Profil Admin -->
      <div class="flex items-center mb-6  p-4 ">
        <img src="https://via.placeholder.com/60" alt="Avatar Admin" class="w-12 h-12 rounded-full mr-3">
        <div>
          <p class="font-bold">ADMIN</p>
          <p class="text-xs">230102071</p>
        </div>
      </div>

      <!-- Menu Navigasi -->
      <nav class="space-y-2">
        <a href="#" class="block bg-gray-200 px-4 py-2 rounded">Dashboard</a>
        <a href="#" class="block hover:bg-gray-200 px-4 py-2 rounded">Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white p-0">
        <header class="bg-yellow-600 text-white p-[28px] flex flex-row-reverse items-center justify-between">
 
            <!-- (Opsional) Tempat avatar user di header -->
            <div class="flex items-center space-x-2">
              <!-- Bisa ganti link gambar -->
              <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-8 h-8 rounded-full">
            </div>
          </header>
      <!-- Breadcrumb -->
      <div class="p-4">
      <p class="text-gray-500 text-sm mb-2">> Data Mahasiswa</p>

      <!-- Tab Menu + Search -->
      <div class="flex items-center justify-between border-b border-gray-300 pb-1">
        <div class="space-x-4">
          <button class="pb-2 border-b-2 border-blue-500 font-semibold text-sm">
            Data Mahasiswa
          </button>
          <button class="pb-2 text-gray-500 text-sm">
            Pengajuan Cuti
          </button>
        </div>
        <div>
          <input
            type="text"
            placeholder="Cari Mahasiswa"
            class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring focus:ring-blue-200"
          />
        </div>
      </div>

      <!-- Tabel / Data Mahasiswa -->
      <div class="mt-4 bg-gray-100 border border-gray-300 rounded h-64 flex items-center justify-center text-gray-500 text-sm">
        POKOKNYA DATA SEMUA MAHASISWA
      </div>
    </div>
    </main>
  </div>
</body>
</html>
