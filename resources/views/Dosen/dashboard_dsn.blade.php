<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>Dosen</title>
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery (Diperlukan oleh DataTable) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTable JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
    <x-layout > 
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-xl font-bold">Berhenti Studi</h2>
            <div class="bg-white p-4 shadow rounded mt-4">
                <div class="grid grid-cols-3 gap-4">
                    <input type="text" placeholder="Periode" class="border p-2 rounded w-full">

                    <select name="" id="" class="border p-2 rounded w-full">
                        <option value="">Pilih Program Studi</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <select name="" id="" class="border p-2 rounded w-full">
                        <option value="">Pilih Status</option>
                        <option value="">Cuti</option>
                        <option value="">Keluar</option>
                    </select>
                </div>
            </div>
            <div class="bg-white p-4 shadow rounded border-t-2 border-blue-400">
                <div class="flex justify-between mb-2">
                </div>
                <div class="pt-1">
                    <table id="myTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mahasiswa</th>
                                <th>Periode</th>
                                <th>Jenis Pengajuan</th>
                                <th>Status Akademik</th>
                                <th>Status Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimasukkan melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layout > 
    <script>
        $("#myTable").DataTable(); // Inisialisasi DataTables
    </script>
</body>
</html>