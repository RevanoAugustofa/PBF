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
      <div id="alert-success" class="flex items-center justify-between p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
        <div class="flex items-center">
            <!-- Icon -->
            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4l5-5-1.4-1.4L9 11.2 7.4 9.6 6 11l3 3z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium">Sukses login sebagai admin</span>
        </div>
        <!-- Close Button -->
        <button onclick="document.getElementById('alert-success').remove()" class="text-green-600 hover:text-green-900">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
        </div>


      <!-- Dashboard -->
      <div class="bg-white p-4 rounded shadow">
          <h2 class="text-xl font-bold">Dashboard</h2>

          <!-- Tabs -->
          <div class="flex space-x-4 border-b mt-2">
              <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Pengajuan Cuti</button>
          </div>

          <!-- Table -->
          <div class="overflow-x-auto mt-4">
              <table class="w-full border border-collapse">
                 <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">NPM</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Tgl Pengajuan</th>
                                <th class="border px-4 py-2">Semester</th>
                                <th class="border px-4 py-2">Dokumen Pendukung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
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
