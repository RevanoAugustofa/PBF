<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP - Cuti</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", async function () {
            try {
                const username = localStorage.getItem('username');
                if (!username) {
                    alert("Silakan login terlebih dahulu.");
                    window.location.href = "/login";
                    return;
                }

                const cutiResponse = await fetch(`http://localhost:8080/cuti`);
                if (!cutiResponse.ok) throw new Error("Gagal mengambil data cuti");
                const cutiResult = await cutiResponse.json();

                const tbody = document.querySelector("#myTable tbody");
                tbody.innerHTML = "";

                if (cutiResult && cutiResult.length > 0) {
                    cutiResult.forEach((cuti, index) => {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `
                            <td class="text-center">${index + 1}</td>
                            <td>${cuti.npm}</td>
                            <td>${cuti.status}</td>
                            <td>${cuti.tgl_pengajuan}</td>
                            <td>${cuti.semester || '-'}</td>
                            <td>${cuti.dokumen_pendukung || '-'}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML = `<tr><td class="text-center" colspan="6">Belum ada pengajuan cuti</td></tr>`;
                }

                // Inisialisasi DataTables
                $('#myTable').DataTable();

            } catch (error) {
                console.error("Terjadi kesalahan:", error);
                alert("Gagal mengambil data.");
            }
        });
    </script>
</head>

<body class="bg-gray-100">
    <!-- Layout Admin -->
    <x-layout_admin>
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-blue-400">
                <p class="text-gray-600"><i class="ri-user-fill"></i> > Riwayat Cuti</p>
                <h2 class="text-2xl font-bold">Admin <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
            </div>

            <!-- Kontrol Tab -->
            <div class="bg-white p-4 rounded shadow mt-4">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold text-blue-600">Riwayat Cuti</button>
                    </div>
                </div>

                <!-- Tabel Riwayat Cuti -->
                <div class="overflow-x-auto">
                    <table id="myTable" class="stripe hover w-full text-sm text-left border-collapse pt-4">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">NPM</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Tgl Pengajuan</th>
                                <th class="px-4 py-2">Semester</th>
                                <th class="px-4 py-2">Dokumen Pendukung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Diisi oleh JS -->
                            <tr><td colspan="6" class="text-center">Memuat data...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layout_admin>
</body>

</html>
