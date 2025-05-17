<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Form Pengajuan Cuti</title>
</head>
<script>
    document.addEventListener("DOMContentLoaded", async function () {
        try {
            const username = localStorage.getItem('username');
            console.log("Username dari localStorage:", username);
            if (!username) {
                alert("Silakan login terlebih dahulu.");
                window.location.href = "/";
                return;
            }

            const mahasiswaResponse = await fetch(`http://localhost:8080/mahasiswa/showName/${username}`);
            if (!mahasiswaResponse.ok) throw new Error("Gagal mengambil data mahasiswa");
            const mahasiswa = await mahasiswaResponse.json();
            console.log("Data dari API:", mahasiswa);

            if (mahasiswa.data && mahasiswa.data.length > 0) {
                const mhs = mahasiswa.data[0];
                document.getElementById("npm").textContent = mhs.npm || "-";
                document.getElementById("nama").textContent = mhs.nama_mahasiswa || "-";
                document.getElementById("prodi").textContent = mhs.program_studi || "-";

                // Isi otomatis input form
                document.getElementById("input-npm").value = mhs.npm || "";
                document.getElementById("input-nama").value = mhs.nama_mahasiswa || "";
                document.getElementById("input-prodi").value = mhs.program_studi || "";
            } else {
                alert("Tidak ada data mahasiswa untuk username ini.");
                console.log("Data array kosong:", mahasiswa.data);
            }
        } catch (error) {
            console.error("Terjadi kesalahan:", error);
            alert("Gagal mengambil data.");
        }
    });
</script>
<body class="bg-gray-100">
    <x-layout username="Revano Augustofa" nim="2301022071">
        <main class="flex-1 p-6">
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-blue-400">
                <div class="mt-4">
                    <p class="text-gray-600"><i class="ri-user-fill"></i> > Pengajuan Cuti > Form Cuti Mahasiswa</p>
                    <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Data Berhenti Studi Mahasiswa.</span></h2>
                </div>
            </div>

            <div class="bg-white shadow-md rounded p-4 mt-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <a href="dashboard_mhs"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Data Mahasiswa</button></a>
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Pengajuan Cuti</button>
                    </div>
                </div>

                <div class="mt-4 p-4 bg-blue-100 rounded">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-2">
                        <p><strong>Nama :</strong> <span id="nama">-</span></p>
                        <p><strong>NPM :</strong> <span id="npm">-</span></p>
                        <p><strong>Program Studi :</strong> <span id="prodi">-</span></p>
                    </div>
                </div>
            </div>

            <!-- Form Pengajuan Cuti -->
            <form action="pengajuanCuti" method="POST">
                <div class="bg-white shadow-md rounded p-6 mt-4 border">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-semibold">NPM</label>
                            <input id="input-npm" name="npm" type="text" class="border p-2 w-full rounded" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold">Dokumen Pendukung</label>
                            <input id="input-dokumen" name="dokumen" type="text" class="border p-2 w-full rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold">Tanggal Pengajuan</label>
                            <input id="input-tanggal" name="tanggal_pengajuan" type="date" class="border p-2 w-full rounded">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-semibold">Alasan Cuti*</label>
                            <textarea id="input-alasan" name="alasan" class="border p-2 w-full rounded"></textarea>
                        </div>
                    </div>
                    <!-- Hidden Inputs -->
                    <input type="hidden" id="input-nama" name="nama">
                    <input type="hidden" id="input-prodi" name="prodi">
                </div>

                <div class="flex justify-end mt-4 space-x-2">
                    <a href="pengajuanCuti"><button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white rounded"><i class="ri-arrow-left-circle-fill"></i> Kembali</button></a>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white hover:bg-green-400 rounded"><i class="ri-checkbox-circle-fill"></i> Simpan</button>
                </div>
            </form>
        </main>
    </x-layout>
</body>
</html>
