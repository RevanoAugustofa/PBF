<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <!-- DataTable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (Diperlukan oleh DataTable) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTable JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <title>Document</title>
</head>
<style>
  /* Custom DataTable agar sesuai dengan Tailwind */
  table.dataTable thead {
      @apply bg-gray-800 text-white;
  }
  table.dataTable tbody tr:nth-child(even) {
      @apply bg-gray-100;
  }
  table.dataTable tbody tr:hover {
      @apply bg-gray-200;
  }
</style>
<body>
    <x-layout_admin > 
      <!-- Main Content -->
    <main class="flex-1 p-6">

      <!-- Notifikasi -->
      <div class="bg-green-500 text-white p-3 my-4 rounded">
          ✅ Berhasil Login sebagai Admin
      </div>

      <!-- Dashboard -->
      <div class="bg-white p-4 rounded shadow">
          <h2 class="text-xl font-bold">Dashboard</h2>

          <!-- Tabs -->
          <div class="flex space-x-4 border-b mt-2">
              <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Cuti Mahasiswa</button>
              <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Pengajuan Cuti</button>
              <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Pengajuan Cuti</button>
          </div>

          <!-- Table -->
          <div class="overflow-x-auto mt-4">
              <table class="w-full border border-collapse">
                  <thead class="bg-blue-900 text-white">
                      <tr>
                          <th class="p-2 border">No</th>
                          <th class="p-2 border">Periode</th>
                          <th class="p-2 border">Smt</th>
                          <th class="p-2 border">Status</th>
                          <th class="p-2 border">SKS</th>
                          <th class="p-2 border">IPS</th>
                          <th class="p-2 border">Total SKS</th>
                          <th class="p-2 border">IPK</th>
                          <th class="p-2 border">Keterangan</th>
                          <th class="p-2 border">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="bg-gray-100">
                          <td class="p-2 border">1</td>
                          <td class="p-2 border">20231</td>
                          <td class="p-2 border">1</td>
                          <td class="p-2 border">Aktif</td>
                          <td class="p-2 border">10</td>
                          <td class="p-2 border">0.00</td>
                          <td class="p-2 border">0</td>
                          <td class="p-2 border">0.00</td>
                          <td class="p-2 border">Fitri Na'ilah Anwar, S.Kom, M.Kom</td>
                          <td class="p-2 border flex space-x-2">
                              <button class="text-blue-500">🔍</button>
                              <button class="text-green-500">👁</button>
                              <button class="text-red-500">🗑</button>
                          </td>
                      </tr>
                      <tr class="bg-white">
                          <td class="p-2 border">2</td>
                          <td class="p-2 border">20232</td>
                          <td class="p-2 border">2</td>
                          <td class="p-2 border text-red-500 font-bold">Cuti</td>
                          <td class="p-2 border">0</td>
                          <td class="p-2 border">0.00</td>
                          <td class="p-2 border">0</td>
                          <td class="p-2 border">0.00</td>
                          <td class="p-2 border">Fitri Na'ilah Anwar, S.Kom, M.Kom</td>
                          <td class="p-2 border flex space-x-2">
                              <button class="text-blue-500">🔍</button>
                              <button class="text-green-500">👁</button>
                              <button class="text-red-500">🗑</button>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>

  </main>
    </x-layout_admin > 
     <script>
        $(document).ready(function () {
            $('#myTable').DataTable(); // Menginisialisasi DataTable
        });
    </script>
</body>
</html>



{{-- <!DOCTYPE html>
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
       
      </div>
    </div>
    </main>
  </div>
</body>
</html> --}}
