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

    <title>Data BAUP</title>
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
    <x-layout_admin> 
        <div class="flex-1 p-6">
            <div class="mt-4">
                <p class="text-gray-600"><i class="ri-user-fill"></i> Data BAUP</p>
                <h2 class="text-2xl font-bold">Bagian Administrasi Umum dan Perlengkapan <span class="text-gray-600 text-sm">Informasi Data BAUP.</span></h2>
            </div>
            <div class="bg-white p-4 rounded shadow mt-4">
                <!-- Tab Menu -->
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data BAUP</button>
                    </div>
                    <a href="#"><button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">+ Tambah</button></a>
                </div>
                <div class="pt-6">
                    <table id="myTable" class="display table table-striped text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID BAUP</th>
                                <th>Nama BAUP</th>
                                <th>ID User</th>
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
    </x-layout_admin> 

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("http://localhost:8080/baup") 
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    
                    let tableBody = document.querySelector("#myTable tbody");
                    tableBody.innerHTML = ""; // Bersihkan isi tabel sebelum mengisi ulang

                    data.forEach((baup, index) => {
                        let row = `<tr>
                            <td>${index + 1}</td>
                            <td>${baup.id_baup}</td>
                            <td>${baup.nama_baup}</td>
                            <td>${baup.id_user}</td>
                            <td class="text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="#" class="bg-red-500 rounded px-3 py-2 text-white"><i class="ri-delete-bin-6-fill"></i></a>
                                <a href="#" class="bg-blue-500 rounded px-3 py-2 text-white"><i class="ri-pencil-fill"></i></a>
                            </div>
                            </td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });

                    $("#myTable").DataTable(); // Inisialisasi DataTables
                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>
</body>
</html>
