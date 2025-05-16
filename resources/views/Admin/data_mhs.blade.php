<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata dasar dan pengaturan responsif -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Import Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Import Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Import DataTables CSS dan jQuery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <title>Data Mahasiswa</title>

    <style>
        /* Styling khusus DataTable dengan Tailwind */
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
    <!-- Menggunakan komponen layout admin (Laravel Blade) -->
    <x-layout_admin>
        <div class="flex-1 p-6">
            <!-- Judul halaman -->
            <div class="mt-4">
                <p class="text-gray-600"><i class="ri-user-fill"></i> Data Mahasiswa</p>
                <h2 class="text-2xl font-bold">
                    Mahasiswa <span class="text-gray-600 text-sm">Informasi Data Mahasiswa.</span>
                </h2>
            </div>

            <!-- Kontainer utama tabel -->
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-gray-400 w-flex">
                <!-- Header aksi -->
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data Mahasiswa</button>
                    </div>
                    <a href="tambah_data_mhs">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                            + Tambah
                        </button>
                    </a>
                </div>

                <!-- Tabel Data Mahasiswa -->
                <div class="pt-6 overflow-x-auto">
                    <table id="myTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                {{-- <th>Tempat, Tanggal Lahir</th> --}}
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
                            <!-- Data mahasiswa akan ditampilkan di sini secara dinamis melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layout_admin>

    <!-- Script untuk menampilkan data mahasiswa ke dalam tabel -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("http://localhost:8080/mahasiswa")
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Debug data

                    let tableBody = document.querySelector("#myTable tbody");
                    tableBody.innerHTML = "";

                    // Menambahkan data ke dalam tabel baris per baris
                    data.forEach((mahasiswa, index) => {
                        let row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${mahasiswa.npm}</td>
                                <td>${mahasiswa.nama_mahasiswa}</td>
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
                                        <!-- Tombol Hapus -->
                                        <button onclick="deleteData('${mahasiswa.npm}')" class="bg-red-500 rounded px-3 py-2 text-white">
                                            <i class="ri-delete-bin-6-fill"></i>
                                        </button>

                                        <!-- Tombol Edit -->
                                        <a href="Edit/edit_mhs?id=${mahasiswa.npm}" class="bg-blue-500 rounded px-3 py-2 text-white">
                                            <i class="ri-pencil-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });

                    // Inisialisasi DataTable
                    $("#myTable").DataTable();
                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>

    <!-- Script untuk menghapus data mahasiswa -->
    <script>
        function deleteData(npm) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                fetch(`http://localhost:8080/mahasiswa/${npm}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Cek respon dari server

                    if (data.status === 200) {
                        alert(data.message.success); // Tampilkan pesan sukses
                        window.location.reload(); // Refresh halaman
                    } else {
                        alert('Gagal menghapus data: ' + (data.message || 'Kesalahan tidak diketahui.'));
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
