<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIP - Cuti</title>

    <!-- Load Tailwind CSS dan Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <script>
        document.addEventListener("DOMContentLoaded", async function() {
            try {
                // Cek login saja, tidak perlu ambil data mahasiswa
                const username = localStorage.getItem('username');
                if (!username) {
                    alert("Silakan login terlebih dahulu.");
                    window.location.href = "/login";
                    return;
                }

                // Ambil semua data cuti dari server
                const cutiResponse = await fetch(`http://localhost:8080/cuti`);
                if (!cutiResponse.ok) throw new Error("Gagal mengambil data cuti");
                const cutiResult = await cutiResponse.json();

                const tbody = document.querySelector("tbody");
                tbody.innerHTML = ""; // Kosongkan isi tabel
                console.log(cutiResult);
                if (cutiResult && cutiResult.length > 0) {
                    cutiResult.forEach((cuti, index) => {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `
                        <td class="border px-4 py-2 text-center">${index + 1}</td>
                        <td class="border px-4 py-2">${cuti.npm}</td>
                        <td class="border px-4 py-2">${cuti.status}</td>
                        <td class="border px-4 py-2">${cuti.tgl_pengajuan}</td>
                        <td class="border px-4 py-2">${cuti.semester || '-'}</td>
                        <td class="border px-4 py-2">${cuti.dokumen_pendukung || '-'}</td>`;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML =
                        `<tr><td class="border px-4 py-2 text-center" colspan="6">Belum ada pengajuan cuti</td></tr>`;
                }

            } catch (error) {
                console.error("Terjadi kesalahan:", error);
                alert("Gagal mengambil data.");
            }
        });
    </script>

</head>

<body class="bg-gray-100">
    <!-- Komponen layout untuk admin -->
    <x-layout_admin>
        <div class="flex-1 p-6">
            <!-- Header Section -->
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-blue-400">
                <div class="mt-4">
                    <p class="text-gray-600"><i class="ri-user-fill"></i> > Riwayat Cuti</p>
                    <h2 class="text-2xl font-bold">Admin <span class="text-gray-600 text-sm">Riwayat berhenti studi
                            mahasiswa.</span></h2>
                </div>
            </div>

            <!-- Kontrol Tombol -->
            <div class="bg-white p-4 rounded shadow mt-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <!-- Navigasi tab -->
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Riwayat Cuti</button>
                    </div>
                </div>

                <!-- Tabel Riwayat Cuti -->
                <div class="mt-4">
                    <table class="w-full border table-auto">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">NPM</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Tgl Pengajuan</th>
                                <th class="border px-4 py-2">Semester</th>
                                <th class="border px-4 py-2">Dokumen Pendukung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan diisi secara dinamis lewat JavaScript -->
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="9">Data kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </x-layout>
</body>

</html>
