<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><!-- Set encoding karakter UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Responsif untuk semua perangkat -->
  <title>Data Ketua Jurusan</title><!-- Judul halaman -->
  
  <!-- Import Tailwind CSS untuk styling -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Import ikon Remix Icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <!-- Import CSS DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- Import jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- Import DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <!-- Menggunakan komponen layout_admin (Laravel Blade Component) -->
  <x-layout_admin>
    <div class="flex-1 p-6">
      <!-- Judul halaman dan subjudul -->
      <div class="mt-4">
        <p class="text-gray-600"><i class="ri-user-fill"></i> Data Ketua Jurusan</p>
        <h2 class="text-2xl font-bold">Ketua Jurusan <span class="text-gray-600 text-sm">Informasi Data Ketua Jurusan.</span></h2>
      </div>

      <!-- Container utama untuk tabel dan tombol aksi -->
      <div class="bg-white p-4 rounded shadow mt-4">
        <!-- Header dengan tombol aktif dan tombol tambah data -->
        <div class="flex justify-between items-center border-b pb-2">
          <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data Ketua Jurusan</button>
          <a href="tambah_data_kajur"><button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">+ Tambah</button></a>
        </div>

        <!-- Tabel data Ketua Jurusan -->
        <div class="pt-6">
          <table id="myTable" class="display w-full">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Ketua Jurusan</th>
                <th>Nama Ketua Jurusan</th>
                <th>Nama Jurusan</th>
                <th>NIDN</th>
                <th>ID User</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody><!-- Isi tabel akan diisi secara dinamis -->
          </table>
        </div>
      </div>
    </div>
  </x-layout_admin>

  <!-- Modal konfirmasi hapus data -->
  <div id="deleteModal" class="hidden fixed inset-0 z-10 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-full max-w-md">
      <div class="p-4 flex items-center">
        <div class="flex items-center justify-center h-11 w-24 rounded-full bg-red-100 text-red-600">
          <i class="ri-error-warning-line"></i><!-- Ikon peringatan -->
        </div>
        <div class="ml-4">
          <h3 class="text-lg font-semibold text-gray-800">Hapus Data</h3>
          <p class="text-sm text-gray-600 mt-1">Apakah Anda yakin ingin menghapus data ini? Semua data terkait akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
        </div>
      </div>
      <!-- Tombol batal dan hapus -->
      <div class="bg-gray-100 px-4 py-3 flex justify-end space-x-2">
        <button onclick="closeDeleteModal()" class="px-4 py-2 rounded bg-white border border-gray-300 text-gray-700 hover:bg-gray-200">Batal</button>
        <button onclick="confirmDelete()" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-500">Hapus</button>
      </div>
    </div>
  </div>

  <script>
    // Variabel global untuk menyimpan ID kajur yang akan dihapus
    let selectedKajurId = null;

    // Event listener saat halaman sudah dimuat penuh
    document.addEventListener("DOMContentLoaded", function () {
      // Fetch data dari API endpoint localhost untuk data ketua jurusan
      fetch("http://localhost:8080/kajur")
        .then(response => response.json())
        .then(data => {
          const tableBody = document.querySelector("#myTable tbody");
          tableBody.innerHTML = ""; // Kosongkan isi tabel terlebih dahulu

          // Loop data yang didapat dan tambahkan baris ke tabel
          data.forEach((kajur, index) => {
            const row = `
              <tr>
                <td>${index + 1}</td><!-- Nomor urut -->
                <td>${kajur.id_kajur}</td>
                <td>${kajur.nama_kajur}</td>
                <td>${kajur.nama_jurusan}</td>
                <td>${kajur.nidn}</td>
                <td>${kajur.id_user}</td>
                <td class="text-center">
                  <div class="flex justify-center space-x-2">
                    <!-- Tombol hapus, memicu modal hapus -->
                    <button onclick="showDeleteModal('${kajur.id_kajur}')" class="bg-red-500 px-3 py-2 text-white rounded"><i class="ri-delete-bin-6-fill"></i></button>
                    <!-- Tombol edit, menuju halaman edit -->
                    <a href="Edit/edit_kajur?id=${kajur.id_kajur}" class="bg-blue-500 px-3 py-2 text-white rounded"><i class="ri-pencil-fill"></i></a>
                  </div>
                </td>
              </tr>`;
            tableBody.innerHTML += row;
          });

          // Inisialisasi DataTables pada tabel
          $('#myTable').DataTable();
        })
        .catch(error => console.error("Error fetching data:", error)); // Tampilkan error jika fetch gagal
    });

    // Fungsi menampilkan modal konfirmasi hapus
    function showDeleteModal(id) {
      selectedKajurId = id; // Simpan ID yang dipilih
      document.getElementById("deleteModal").classList.remove("hidden"); // Tampilkan modal
    }

    // Fungsi menutup modal konfirmasi hapus
    function closeDeleteModal() {
      selectedKajurId = null; // Reset ID
      document.getElementById("deleteModal").classList.add("hidden"); // Sembunyikan modal
    }

    // Fungsi untuk melakukan penghapusan data setelah konfirmasi
    function confirmDelete() {
      if (!selectedKajurId) return; // Jika tidak ada ID terpilih, keluar

      // Kirim permintaan DELETE ke API dengan ID terpilih
      fetch(`http://localhost:8080/kajur/${selectedKajurId}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(response => response.json())
        .then(data => {
          // Jika status sukses, tampilkan alert dan refresh halaman
          if (data.status === 200) {
            alert(data.message.success);
            window.location.reload();
          } else {
            alert('Gagal menghapus data.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat menghapus data.');
        });

      closeDeleteModal(); // Tutup modal setelah aksi hapus
    }
  </script>
</body>
</html>
