<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <title>Data Mahasiswa</title>

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
</head>

<body>
    <x-layout_admin>
        <div class="flex-1 p-6">
            <div class="mt-4">
                <p class="text-gray-600"><i class="ri-user-fill"></i> Data Mahasiswa</p>
                <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Informasi Data Mahasiswa.</span></h2>
            </div>
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-gray-400 w-flex">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data Mahasiswa</button>
                    </div>
                    <a href="tambah_data_mhs">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">+ Tambah</button>
                    </a>
                </div>
                <div class="pt-6 overflow-x-auto">
                    <table id="myTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Angkatan</th>
                                <th>Program Studi</th>
                                <th>Semester</th>
                                <th>No HP</th>
                                <th>Email</th>
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
            fetch("http://localhost:8080/mahasiswa")
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    let tableBody = document.querySelector("#myTable tbody");
                    tableBody.innerHTML = "";

                    data.forEach((mahasiswa, index) => {
                        let row = `<tr>
                            <td>${index + 1}</td>
                            <td>${mahasiswa.npm}</td>
                            <td>${mahasiswa.nama_mahasiswa}</td>
                            <td>${mahasiswa.tempat_tanggal_lahir}</td>
                            <td>${mahasiswa.jenis_kelamin}</td>
                            <td>${mahasiswa.alamat}</td>
                            <td>${mahasiswa.agama}</td>
                            <td>${mahasiswa.angkatan}</td>
                            <td>${mahasiswa.program_studi}</td>
                            <td>${mahasiswa.semester}</td>
                            <td>${mahasiswa.no_hp}</td>
                            <td>${mahasiswa.email}</td>
                            <td class="text-center">
                                <div class="flex justify-center space-x-2">
                                    <button onclick="deleteData('${mahasiswa.npm}')" class="bg-red-500 rounded px-3 py-2 text-white">
                                        <i class="ri-delete-bin-6-fill"></i>
                                    </button>
                                    <a href="Edit/edit_mhs?id=${mahasiswa.id}" class="bg-blue-500 rounded px-3 py-2 text-white">
                                        <i class="ri-pencil-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                    $("#myTable").DataTable();
                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>

    <script>
        function deleteData(npm) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                fetch(`http://localhost:8080/mahasiswa/${npm}`, { // Cek apakah port kamu benar!
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest', // Penting agar Laravel mengenali requestnya
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Data berhasil dihapus!");
                            window.location.reload();
                        } else {
                            alert('Gagal menghapus data. ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menghapus data.');
                    });
            }
        }
    </script>
</body>

</html>
