<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Ketua Jurusan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <x-layout_admin>
    <div class="flex-1 p-6">
      <div class="mt-4">
        <p class="text-gray-600"><i class="ri-user-fill"></i> Data Ketua Jurusan</p>
        <h2 class="text-2xl font-bold">Ketua Jurusan <span class="text-gray-600 text-sm">Informasi Data Ketua Jurusan.</span></h2>
      </div>
      <div class="bg-white p-4 rounded shadow mt-4">
        <div class="flex justify-between items-center border-b pb-2">
          <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data Ketua Jurusan</button>
          <a href="tambah_data_kajur"><button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">+ Tambah</button></a>
        </div>
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
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </x-layout_admin>

  <!-- Modal Hapus -->
  <div id="deleteModal" class="hidden fixed inset-0 z-10 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-full max-w-md">
      <div class="p-4 flex items-center">
        <div class="flex items-center justify-center h-11 w-24 rounded-full bg-red-100 text-red-600">
          <i class="ri-error-warning-line"></i>
        </div>
        <div class="ml-4">
          <h3 class="text-lg font-semibold text-gray-800">Hapus Data</h3>
          <p class="text-sm text-gray-600 mt-1">Apakah Anda yakin ingin menghapus data ini? Semua data terkait akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
        </div>
      </div>
      <div class="bg-gray-100 px-4 py-3 flex justify-end space-x-2">
        <button onclick="closeDeleteModal()" class="px-4 py-2 rounded bg-white border border-gray-300 text-gray-700 hover:bg-gray-200">Batal</button>
        <button onclick="confirmDelete()" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-500">Hapus</button>
      </div>
    </div>
  </div>

  <script>
    let selectedKajurId = null;

    document.addEventListener("DOMContentLoaded", function () {
      fetch("http://localhost:8080/kajur")
        .then(response => response.json())
        .then(data => {
          const tableBody = document.querySelector("#myTable tbody");
          tableBody.innerHTML = "";

          data.forEach((kajur, index) => {
            const row = `
              <tr>
                <td>${index + 1}</td>
                <td>${kajur.id_kajur}</td>
                <td>${kajur.nama_kajur}</td>
                <td>${kajur.nama_jurusan}</td>
                <td>${kajur.nidn}</td>
                <td>${kajur.id_user}</td>
                <td class="text-center">
                  <div class="flex justify-center space-x-2">
                    <button onclick="showDeleteModal('${kajur.id_kajur}')" class="bg-red-500 px-3 py-2 text-white rounded"><i class="ri-delete-bin-6-fill"></i></button>
                    <a href="Edit/edit_kajur?id=${kajur.id_kajur}" class="bg-blue-500 px-3 py-2 text-white rounded"><i class="ri-pencil-fill"></i></a>
                  </div>
                </td>
              </tr>`;
            tableBody.innerHTML += row;
          });

          $('#myTable').DataTable();
        })
        .catch(error => console.error("Error fetching data:", error));
    });

    function showDeleteModal(id) {
      selectedKajurId = id;
      document.getElementById("deleteModal").classList.remove("hidden");
    }

    function closeDeleteModal() {
      selectedKajurId = null;
      document.getElementById("deleteModal").classList.add("hidden");
    }

    function confirmDelete() {
      if (!selectedKajurId) return;

      fetch(`http://localhost:8080/kajur/${selectedKajurId}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
        .then(response => response.json())
        .then(data => {
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

      closeDeleteModal();
    }
  </script>
</body>
</html>
