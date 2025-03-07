<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>SIP - Cuti</title>
    <script>
        
        document.addEventListener("DOMContentLoaded", async function () {
            try {
                // Ambil data user yang sedang login dari API
                const username = localStorage.getItem('username');
                console.log("Username dari localStorage:", username);
            if (!username) {
                alert("Silakan login terlebih dahulu.");
                window.location.href = "/";
                return;
            }

                // Ambil data mahasiswa berdasarkan username dari user
                const mahasiswaResponse = await fetch(`http://localhost:8080/mahasiswa/showName/${username}`);
                if (!mahasiswaResponse.ok) throw new Error("Gagal mengambil data mahasiswa");
                const mahasiswa = await mahasiswaResponse.json();
                console.log("Data dari API:", mahasiswa);
                // Masukkan data ke dalam tabel
                if (mahasiswa.data && mahasiswa.data.length > 0) {
                    const mahasiswaData = mahasiswa.data[0]; // Ambil objek pertama dari array
                    document.getElementById("npm").innerHTML = mahasiswaData.npm || "-";
                    document.getElementById("nama").innerHTML = mahasiswaData.nama_mahasiswa ||  "-";
                    document.getElementById("ttl").innerHTML = mahasiswaData.tempat_tanggal_lahir ||  "-";
                    document.getElementById("jenis_kelamin").innerHTML = mahasiswaData.jenis_kelamin ||  "-";
                    document.getElementById("agama").innerHTML = mahasiswaData.agama || "-";
                    document.getElementById("tahun_akademik").innerHTML = mahasiswaData.angkatan ||  "-";
                    document.getElementById("prodi").innerHTML = mahasiswaData.program_studi || "-";
                    document.getElementById("jurusan").innerHTML = mahasiswaData.nama_jurusan || "-";
                    document.getElementById("alamat").innerHTML = mahasiswaData.alamat || "-";
                    document.getElementById("email").innerHTML = mahasiswaData.email || "-";
                    document.getElementById("no_hp").innerHTML = mahasiswaData.no_hp || "-";
                } else {
                    alert("Tidak ada data mahasiswa untuk username ini.");
                    console.log("Data array kosong atau tidak ada:", mahasiswa.data);
                }
            } catch (error) {
                console.error("Terjadi kesalahan:", error);
                alert("Gagal mengambil data.");
            }
        });
    </script>
</head>
<body class="bg-gray-100">
    <x-layout > 
        <div class="flex-1 p-6">
            <div class="mt-4">
                <p class="text-gray-600"><i class="ri-user-fill"></i>> Data Mahasiswa</p>
                <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Data Studi Mahasiswa.</span></h2>
            </div>
            <div class="bg-white p-4 rounded shadow mt-4">
                 <!-- Tab Menu -->
                <div class="flex justify-between items-center border-b pb-2">
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 border-b-4 border-blue-500 font-semibold">Data Mahasiswa</button>
                       <a href="pengajuanCuti"><button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded ">Pengajuan Cuti</button></a> 
                       <a href="riwayat"><button class="px-4 py-2  text-gray-600 hover:bg-gray-100 rounded  ">Timeline Pengajuan</button></a>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row pt-4">
                    <div class="w-full bg-gray-50 p-4 rounded">
                        <h3 class="font-bold">Data Mahasiswa</h3>
                        <table class="w-full mt-2 border border-collapse table-auto">
                            <tbody class="divide-y divide-gray-300">
                                <tr class="bg-gray-100"><td class="p-4 font-semibold w-3/4">NPM</td><td class="p-4 w-2/3" id="npm"></td></tr>
                                <tr class="bg-white"><td class="p-4 font-semibold">Nama</td><td class="p-4" id="nama">-</td></tr>
                                <tr class="bg-gray-100"><td class="p-4 font-semibold">Tempat/ Tgl Lahir</td><td class="p-4" id="ttl"></td></tr>
                                <tr class="bg-white"><td class="p-4 font-semibold">Jenis Kelamin</td><td class="p-4" id="jenis_kelamin"></td></tr>
                                <tr class="bg-gray-100"><td class="p-4 font-semibold">Agama</td><td class="p-4" id="agama"></td></tr>
                                <tr class="bg-white"><td class="p-4 font-semibold">Tahun Akademik</td><td class="p-4" id="tahun_akademik"></td></tr>
                                <tr class="bg-gray-100"><td class="p-4 font-semibold">Program Studi</td><td class="p-4" id="prodi"></td></tr>
                                <tr class="bg-white"><td class="p-4 font-semibold">Jurusan</td><td class="p-4" id="jurusan"></td></tr>
                                <tr class="bg-white"><td class="p-4 font-semibold">Alamat</td><td class="p-4" id="alamat"></td></tr>
                                <tr class="bg-gray-100"><td class="p-4 font-semibold">Email</td><td class="p-4" id="email"></td></tr>
                                <tr class="bg-white"><td class="p-4 font-semibold">No Handphone</td><td class="p-4" id="no_hp"></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-layout>
</body>
</html>
