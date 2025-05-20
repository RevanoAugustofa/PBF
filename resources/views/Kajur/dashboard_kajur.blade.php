<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Pengaturan karakter dan responsivitas halaman -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Judul halaman -->
  <title>SIP - Pengajuan Cuti Mahasiswa</title>

  <!-- Import TailwindCSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />

  <!-- Import ikon Remix -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>

  <!-- Import stylesheet untuk DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <!-- Import jQuery dan DataTables -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body class="bg-gray-100">
  <!-- Komponen layout Blade dengan atribut username dan NIM -->
  <x-layout username="Revano Augustofa" nim="2301022071">

  <!-- Konten utama halaman -->
  <div class="p-6">
    <!-- Header dashboard -->
    <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-blue-400">
      <div class="mt-4">
        <p class="text-gray-600"><i class="ri-user-star-fill"></i> > Dashboard Kajur</p>
        <h2 class="text-2xl font-bold">Data Pengajuan Cuti <span class="text-gray-600 text-sm">Verifikasi dan kontrol pengajuan cuti mahasiswa</span></h2>
      </div>
    </div>

    <!-- Tabel pengajuan cuti -->
    <div class="bg-white p-4 rounded shadow mt-4">
      <div class="flex justify-between items-center border-b pb-2">
        <h3 class="text-lg font-semibold">Pengajuan Cuti</h3>
      </div>

      <div class="overflow-x-auto mt-4">
        <!-- Tabel dengan id untuk DataTables -->
        <table id="myTable" class="display w-full">
          <thead class="bg-blue-600 text-white">
            <tr>
              <!-- Kolom tabel -->
              <th class="px-4 py-2">No</th>
              <th class="px-4 py-2">NPM</th>
              <th class="px-4 py-2">Semester</th>
              <th class="px-4 py-2">Tgl Pengajuan</th>
              <th class="px-4 py-2">Status</th>
              <th class="px-4 py-2">Dokumen Pendukung</th>
              <th class="px-4 py-2">Alasan</th>
              <th class="px-4 py-2">Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal detail dan verifikasi pengajuan cuti -->
  <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white w-full max-w-md p-6 rounded shadow-lg">
      <h2 class="text-xl font-semibold mb-4">Detail Pengajuan</h2>

      <!-- Formulir edit status -->
      <form id="formEdit">
        <input type="hidden" id="editId">

        <!-- Field NPM -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">NPM</label>
          <input type="text" id="editNpm" class="w-full px-3 py-2 border rounded" readonly>
        </div>

        <!-- Field Semester -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Semester</label>
          <input type="text" id="editSemester" class="w-full px-3 py-2 border rounded" readonly>
        </div>

        <!-- Field Tanggal Pengajuan -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
          <input type="text" id="editTgl" class="w-full px-3 py-2 border rounded" readonly>
        </div>

        <!-- Field Dokumen -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Dokumen Pendukung</label>
          <input type="text" id="editDokumen" class="w-full px-3 py-2 border rounded" readonly>
        </div>

        <!-- Field Alasan -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Alasan</label>
          <textarea id="editAlasan" class="w-full px-3 py-2 border rounded" rows="3" readonly></textarea>
        </div>

        <!-- Field Status (bisa diubah) -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Status</label>
          <select id="editStatus" class="w-full px-3 py-2 border rounded">
            <option value="Disetujui">Disetujui</option>
            <option value="Ditolak">Ditolak</option>
          </select>
        </div>

        <!-- Tombol aksi -->
        <div class="flex justify-end space-x-2">
          <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  </x-layout>

  <!-- Script JS -->
  <script>
    // Saat dokumen selesai dimuat
    document.addEventListener("DOMContentLoaded", function () {
      // Ambil data cuti dari API lokal
      fetch("http://localhost:8080/cuti")
        .then(response => response.json())
        .then(data => {
          const tableBody = document.querySelector("#myTable tbody");
          tableBody.innerHTML = "";

          // Masukkan data ke dalam tabel
          data.forEach((item, index) => {
            const itemData = JSON.stringify(item).replace(/"/g, '&quot;'); // Escape karakter untuk digunakan di onclick
            const row = `
              <tr class="border">
                <td class="px-4 py-2">${index + 1}</td>
                <td class="px-4 py-2">${item.npm}</td>
                <td class="px-4 py-2">${item.semester}</td>
                <td class="px-4 py-2">${item.tgl_pengajuan}</td>
                <td class="px-4 py-2">${item.status || 'Belum Diverifikasi'}</td>
                <td class="px-4 py-2">${item.dokumen_pendukung || '-'}</td>
                <td class="px-4 py-2">${item.alasan || '-'}</td>
                <td class="px-4 py-2">
                  <button onclick='openModal(${itemData})' class="bg-blue-500 px-3 py-2 text-white rounded"><i class="ri-eye-fill"></i></button>
                </td>
              </tr>`;
            tableBody.innerHTML += row;
          });
          
          $('#myTable').DataTable(); // Aktifkan fitur DataTables
        })
        .catch(error => {
          console.error("Error fetching data:", error); // Tampilkan kesalahan
        });
    });

    // Fungsi membuka modal dengan data dari baris
    function openModal(data) {
      console.log("Data modal:", data); // Debug

      // Isi data ke form
      document.getElementById("editId").value = data.id_cuti;
      document.getElementById("editNpm").value = data.npm;
      document.getElementById("editSemester").value = data.semester;
      document.getElementById("editTgl").value = data.tgl_pengajuan;
      document.getElementById("editStatus").value = data.status || "Belum Diverifikasi";
      document.getElementById("editDokumen").value = data.dokumen_pendukung || "-";
      document.getElementById("editAlasan").value = data.alasan || "-";

      // Tampilkan modal
      document.getElementById("modalEdit").classList.remove("hidden");
    }

    // Fungsi menutup modal
    function closeModal() {
      document.getElementById("modalEdit").classList.add("hidden");
    }

    // Fungsi saat form disubmit
    document.getElementById("formEdit").addEventListener("submit", function(e) {
      e.preventDefault(); // Cegah reload form

      const id = document.getElementById("editId").value;

      // Ambil data yang akan diupdate
      const updatedData = new URLSearchParams({
        npm: document.getElementById("editNpm").value,
        semester: document.getElementById("editSemester").value,
        tgl_pengajuan: document.getElementById("editTgl").value,
        dokumen_pendukung: document.getElementById("editDokumen").value,
        alasan: document.getElementById("editAlasan").value,
        status: document.getElementById("editStatus").value,
      }).toString();

      console.log("Update ID:", id, "Data:", updatedData); // Debug

      // Kirim PUT request ke API
      fetch(`http://localhost:8080/cuti/${id}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: updatedData
      })
      .then(response => {
        if (!response.ok) {
          return response.text().then(text => { throw new Error(text || "Gagal memperbarui data"); });
        }
        return response.json();
      })
      .then(() => {
        closeModal();
        alert("Status berhasil diperbarui!");
        location.reload(); // Reload halaman agar data tabel terupdate
      })
      .catch(error => {
        console.error("Terjadi kesalahan:", error);
        alert("Terjadi kesalahan saat memperbarui status.");
      });
    });
  </script>
</body>
</html>
