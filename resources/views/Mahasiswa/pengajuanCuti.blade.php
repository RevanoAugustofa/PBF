<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SIP - Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>

    <script>
    document.addEventListener("DOMContentLoaded", async function () {
        try {
            const username = localStorage.getItem('username');
            if (!username) {
                alert("Silakan login terlebih dahulu.");
                window.location.href = "/login";
                return;
            }

            // Ambil data mahasiswa berdasarkan username
            const mahasiswaResponse = await fetch(`http://localhost:8080/mahasiswa/showName/${username}`);
            if (!mahasiswaResponse.ok) throw new Error("Gagal mengambil data mahasiswa");
            const mahasiswa = await mahasiswaResponse.json();

            if (mahasiswa.data && mahasiswa.data.length > 0) {
                const mahasiswaData = mahasiswa.data[0];
                const npm = mahasiswaData.npm;

                document.getElementById("npm").textContent = npm || "-";
                document.getElementById("nama").textContent = mahasiswaData.nama_mahasiswa || "-";
                document.getElementById("prodi").textContent = mahasiswaData.program_studi || "-";

                // Ambil data cuti
                const cutiResponse = await fetch(`http://localhost:8080/cuti/npm/${npm}`);
                const cutiResult = await cutiResponse.json();

                const tbody = document.querySelector("tbody");
                tbody.innerHTML = "";

                const btnTambah = document.getElementById("btnTambah");

                if (cutiResult.data && cutiResult.data.length > 0) {
                    // Sudah pernah mengajukan cuti
                    cutiResult.data.forEach((cuti, index) => {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `
                            <td class="border px-4 py-2 text-center">${index + 1}</td>
                            <td class="border px-4 py-2">${cuti.npm}</td>
                            <td class="border px-4 py-2">${cuti.status}</td>
                            <td class="border px-4 py-2">${cuti.tgl_pengajuan}</td>
                            <td class="border px-4 py-2">${cuti.semester || '-'}</td>
                            <td class="border px-4 py-2">${cuti.dokumen_pendukung || '-'}</td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Cegah pengajuan kedua
                    btnTambah.addEventListener("click", (e) => {
                        e.preventDefault();
                        alert("NPM sudah terdaftar untuk cuti, mahasiswa hanya boleh mengajukan cuti sekali.");
                    });

                } else {
                    tbody.innerHTML = `<tr><td class="border px-4 py-2 text-center" colspan="9">Belum ada pengajuan cuti</td></tr>`;

                    // Arahkan ke form cuti jika belum pernah
                    btnTambah.addEventListener("click", () => {
                        window.location.href = "formCuti";
                    });
                }
            } else {
                alert("Tidak ada data mahasiswa untuk username ini.");
            }

        } catch (error) {
            console.error("Terjadi kesalahan:", error);
            alert("Gagal mengambil data.");
        }
    });
    </script>
</head>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
        <div class="flex-1 p-6">
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-blue-400">
                <div class="mt-4">
                    <p class="text-gray-600"><i class="ri-user-fill"></i> > Pengajuan Cuti</p>
                    <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
                </div>
            </div>

            <div class="bg-white p-4 rounded shadow mt-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <a href="dashboard_mhs"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Data Mahasiswa</button></a>
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Pengajuan Cuti</button>
                    </div>
                    <button id="btnTambah" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">+ Tambah</button>
                </div>

                <div class="mt-4 p-4 bg-blue-100 rounded">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-2">
                        <p><strong>Nama : </strong> <span id="nama"></span></p>
                        <p><strong>NPM : </strong> <span id="npm"></span></p>
                        <p><strong>Program Studi : </strong> <span id="prodi"></span></p>
                    </div>
                </div>

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
