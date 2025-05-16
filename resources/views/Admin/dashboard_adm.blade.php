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
                          <th class="p-2 border">Keterangan</th>
                          <th class="p-2 border">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="bg-gray-100">
                          <td class="p-2 border">1</td>
                          <td class="p-2 border">2023</td>
                          <td class="p-2 border">1</td>
                          <td class="p-2 border">Aktif</td>
                          <td class="p-2 border">Fitri Na'ilah Anwar, S.Kom, M.Kom</td>
                          <td class="p-2 border flex space-x-2">
                              <div class="flex justify-center space-x-2">
                                <a href="#" class="bg-red-500 rounded px-3 py-2 text-white"><i class="ri-delete-bin-6-fill"></i></a>
                                <a href="#" class="bg-blue-500 rounded px-3 py-2 text-white"><i class="ri-pencil-fill"></i></a>
                            </div>
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
