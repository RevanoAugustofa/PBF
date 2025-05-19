<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata dasar dan pengaturan responsif -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Import Tailwind CSS dari CDN untuk styling cepat -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Import ikon Remix Icon dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Import CSS DataTables untuk tabel interaktif dan jQuery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <title>Data Mahasiswa</title>

    <style>
        /* Styling khusus untuk header tabel DataTable menggunakan Tailwind melalui @apply */
        table.dataTable thead {
            @apply bg-gray-800 text-white;
        }

        /* Styling baris genap pada tabel dengan background abu-abu terang */
        table.dataTable tbody tr:nth-child(even) {
            @apply bg-gray-100;
        }

        /* Styling hover pada baris tabel agar berubah warna */
        table.dataTable tbody tr:hover {
            @apply bg-gray-200;
        }
    </style>
</head>

<body>
    <!-- Komponen layout admin (Laravel Blade) sebagai wrapper halaman -->
    <x-layout_admin>
        <div class="flex-1 p-6">
            <!-- Judul halaman dan ikon -->
            <div class="mt-4">
                <p class="text-gray-600"><i class="ri-user-fill"></i> Data Mahasiswa</p>
                <h2 class="text-2xl font-bold">
                    Mahasiswa <span class="text-gray-600 text-sm">Informasi Data Mahasiswa.</span>
                </h2>
            </div>

            <!-- Kontainer utama untuk tabel data mahasiswa -->
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 w-flex">
                <!-- Header aksi dengan tombol Data Mahasiswa dan tombol Tambah -->
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <!-- Tombol aktif (styled dengan border bawah biru) -->
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data Mahasiswa</button>
                    </div>
                    <!-- Link menuju halaman tambah data mahasiswa -->
                    <a href="tambah_data_mhs">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                            + Tambah
                        </button>
                    </a>
                </div>

                <!-- Bagian tabel dengan scroll horizontal jika overflow -->
                <div class="pt-6 overflow-x-auto">
                    <table id="myTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <!-- Header kolom tabel -->
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <!-- <th>Tempat, Tanggal Lahir</th> (komentar blade) -->
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Angkatan</th>
                                <th>Program Studi</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Baris data akan diisi secara dinamis oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layout_admin>

    <!-- Script untuk mengambil data mahasiswa dari server dan menampilkannya ke tabel -->
    <script>
        // Event DOMContentLoaded memastikan script berjalan setelah halaman dimuat penuh
        document.addEventListener("DOMContentLoaded", function () {
            // Mengambil data mahasiswa dari API lokal
            fetch("http://localhost:8080/mahasiswa")
                .then(response => response.json()) // Parsing response ke JSON
                .then(data => {
                    console.log(data); // Debug: lihat data yang diterima di console

                    // Ambil elemen tbody pada tabel
                    let tableBody = document.querySelector("#myTable tbody");
                    tableBody.innerHTML = ""; // Kosongkan isi tabel terlebih dahulu

                    // Loop data mahasiswa dan buat row tabel untuk setiap mahasiswa
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
                                <td>${mahasiswa.no_hp}</td>
                                <td>${mahasiswa.email}</td>
                                <td class="text-center">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Tombol hapus dengan event onclick untuk memanggil fungsi deleteData -->
                                        <button onclick="deleteData('${mahasiswa.npm}')" class="bg-red-500 rounded px-3 py-2 text-white">
                                            <i class="ri-delete-bin-6-fill"></i>
                                        </button>

                                        <!-- Tombol edit yang mengarah ke halaman edit dengan parameter npm -->
                                        <a href="Edit/edit_mhs?id=${mahasiswa.npm}" class="bg-blue-500 rounded px-3 py-2 text-white">
                                            <i class="ri-pencil-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        `;
                        // Tambahkan row ke dalam tbody
                        tableBody.innerHTML += row;
                    });

                    // Inisialisasi DataTables pada tabel #myTable untuk fitur sorting, paging, search dll
                    $("#myTable").DataTable();
                })
                .catch(error => console.error("Error fetching data:", error)); // Tangani error fetch
        });
    </script>

    <!-- Script fungsi untuk menghapus data mahasiswa -->
    <script>
        // Fungsi menghapus data mahasiswa berdasarkan npm
        function deleteData(npm) {
            // Konfirmasi pengguna sebelum menghapus
            if (confirm('Yakin ingin menghapus data ini?')) {
                // Lakukan request DELETE ke API
                fetch(`http://localhost:8080/mahasiswa/${npm}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest' // Header khusus AJAX
                    }
                })
                .then(response => response.json()) // Parsing response
                .then(data => {
                    console.log(data); // Debug response dari server

                    if (data.status === 200) {
                        alert(data.message.success); // Tampilkan pesan sukses
                        window.location.reload(); // Reload halaman untuk update data
                    } else {
                        // Jika gagal, tampilkan pesan error
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
