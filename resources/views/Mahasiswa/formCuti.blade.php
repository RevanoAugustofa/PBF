<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata dasar -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    
    <!-- Import ikon Remix dan TailwindCSS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>

    <title>Form Pengajuan Cuti</title>
</head>
<body class="bg-gray-100">
    <!-- Komponen layout, kemungkinan Blade component -->
    <x-layout username="Revano Augustofa" nim="2301022071">
        <main class="flex-1 p-6">
            
            <!-- Header halaman -->
            <div class="bg-white p-4 rounded shadow mt-4 border-t-4 border-blue-400">
                <div class="mt-4">
                    <p class="text-gray-600"><i class="ri-user-fill"></i> > Pengajuan Cuti > Form Cuti Mahasiswa</p>
                    <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Data Berhenti Studi Mahasiswa.</span></h2>
                </div>
            </div>

            <!-- Navigasi tab data dan form -->
            <div class="bg-white shadow-md rounded p-4 mt-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <!-- Tombol navigasi -->
                        <a href="dashboard_mhs"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Data Mahasiswa</button></a>
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Pengajuan Cuti</button>
                    </div>
                </div>

                <!-- Data Mahasiswa (akan diisi dengan fetch) -->
                <div class="mt-4 p-4 bg-blue-100 rounded">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-2">
                        <p><strong>Nama :</strong> <span id="nama">-</span></p>
                        <p><strong>NPM :</strong> <span id="npm">-</span></p>
                        <p><strong>Program Studi :</strong> <span id="prodi">-</span></p>
                    </div>
                </div>
            </div>

            <!-- Form untuk pengajuan cuti -->
            <form id="tambah-cuti" method="POST">
                <div class="bg-white shadow-md rounded p-6 mt-4 border">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Input NPM (readonly, diisi otomatis) -->
                        <div>
                            <label class="block text-gray-700 font-semibold">NPM</label>
                            <input id="input-npm" name="npm" type="text" class="border p-2 w-full rounded" readonly>
                        </div>
                        <!-- Input dokumen pendukung -->
                        <div>
                            <label class="block text-gray-700 font-semibold">Dokumen Pendukung</label>
                            <input id="input-dokumen" name="dokumen_pendukung" type="text" class="border p-2 w-full rounded" required>
                        </div>
                        <!-- Input tanggal pengajuan -->
                        <div>
                            <label class="block text-gray-700 font-semibold">Tanggal Pengajuan</label>
                            <input id="input-tanggal" name="tgl_pengajuan" type="date" class="border p-2 w-full rounded" required>
                        </div>
                        <!-- Input semester -->
                        <div>
                            <label class="block text-gray-700 font-semibold">Semester</label>
                            <input id="input-semester" name="semester" type="number" class="border p-2 w-full rounded" required>
                        </div>
                        <!-- Textarea alasan cuti -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-semibold">Alasan Cuti*</label>
                            <textarea id="input-alasan" name="alasan" class="border p-2 w-full rounded" required></textarea>
                        </div>
                    </div>
                    <!-- Input tersembunyi untuk status -->
                    <input type="hidden" id="status" name="status" value="sedang diproses">
                </div>

                <!-- Tombol aksi -->
                <div class="flex justify-end mt-4 space-x-2">
                    <a href="pengajuanCuti">
                        <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white rounded">
                            <i class="ri-arrow-left-circle-fill"></i> Kembali
                        </button>
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white hover:bg-green-400 rounded">
                        <i class="ri-checkbox-circle-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </main>
    </x-layout>

    <!-- Ambil data mahasiswa berdasarkan username di localStorage -->
    <script>
        document.addEventListener("DOMContentLoaded", async function () {
            try {
                const username = localStorage.getItem('username'); // Ambil username dari localStorage
                if (!username) {
                    alert("Silakan login terlebih dahulu.");
                    window.location.href = "/login";
                    return;
                }

                // Ambil data mahasiswa dari backend
                const response = await fetch(`http://localhost:8080/mahasiswa/showName/${username}`);
                if (!response.ok) throw new Error("Gagal mengambil data mahasiswa");
                const data = await response.json();
                console.log("Data yang akan dikirim:", data);

                // Jika data ditemukan, isi elemen dan form
                if (data.data && data.data.length > 0) {
                    const mhs = data.data[0];
                    document.getElementById("npm").textContent = mhs.npm || "-";
                    document.getElementById("nama").textContent = mhs.nama_mahasiswa || "-";
                    document.getElementById("prodi").textContent = mhs.program_studi || "-";
                    document.getElementById("input-npm").value = mhs.npm || "";

                    // Atur endpoint untuk submit berdasarkan npm
                    document.getElementById("tambah-cuti").action = `http://localhost:8080/cuti/${mhs.npm}`;
                } else {
                    alert("Tidak ada data mahasiswa.");
                }
            } catch (err) {
                console.error(err);
                alert("Terjadi kesalahan saat mengambil data.");
            }
        });
    </script>

    <!-- Submit form via fetch API dengan POST -->
    <script>
        document.getElementById('tambah-cuti').addEventListener('submit', function(e) {
            e.preventDefault(); // Cegah pengiriman default

            const form = e.target;
            const formData = new FormData(form); // Ambil semua data form
            const data = Object.fromEntries(formData.entries()); // Ubah menjadi objek

            const npm = data.npm; // Ambil NPM untuk endpoint URL

            // Kirim data ke server
            fetch(`http://localhost:8080/cuti/${npm}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data) // Kirim dalam format JSON
            })
            .then(response => {
                if (response.ok) {
                    alert('Data berhasil ditambahkan!');
                    window.location.href = "pengajuanCuti";
                } else {
                    return response.json().then(errorData => {
                        alert(`Terjadi kesalahan: ${errorData.message || 'Coba lagi!'}`);
                    });
                }
            })
            .catch(error => {
                console.error("Detail error:", error);
                alert("Gagal terhubung ke server.");
            });
        });
    </script>
</body>
</html>
