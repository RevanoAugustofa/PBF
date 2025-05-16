@props(['mahasiswa', 'npm'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
<div class="flex h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-300 h-screen flex flex-col">
    <div class="text-lg font-bold text-center py-4 bg-blue-600 text-white">
      <img src="{{ asset('img/cuti.png') }}" alt="Profil" class="h-8 mx-auto">
    </div>
  
    <!-- Profil -->
    <div class="flex items-center space-x-3 bg-white text-black pt-3 px-4 rounded-lg mb-3">
      <img src="{{ asset('img/profile.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full">
      <div>
          <p class="font-semibold" id="nama_mhs_sidebar">-</p>
          <span class="text-xs bg-gray-500 text-white px-2 py-1 rounded" id="npm_mhs_sidebar">-</span>
      </div>
    </div>

    <div class="px-4">
      <hr class="border-t border-gray-300 mb-3">
    </div>

    <!-- Navigasi Sidebar -->
    <nav class="flex flex-col space-y-2 px-4">
      <a href="#" class="block py-2 px-4 bg-blue-500 rounded text-white"><i class="ri-dashboard-horizontal-fill pr-5"></i>Dashboard</a>
      <a href="#" onclick="confirmLogout(event)" class="py-2 px-4 mt-2 hover:bg-gray-200 rounded text-black"><i class="ri-shut-down-line pr-5"></i>Logout</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <nav class="bg-blue-600 text-white p-3 flex justify-between items-center sticky top-0 z-10">
      <!-- Menu Line di Kiri -->
      <div class="flex items-center">
        <a href="#"><i class="ri-menu-line text-xl"></i></a>
      </div>
    
      <!-- Profil, Nama Mahasiswa, dan Notifikasi di Kanan -->
      <div class="flex items-center space-x-4">
        <img src="{{ asset('img/profile.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full">
        <span id="nama_mhs_navbar"></span>
        <i class="ri-notification-3-fill text-xl"></i>
      </div>
    </nav>    

    <!-- Konten -->
    <div class="p-5 flex-1 overflow-y-auto">
      {{ $slot }}
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", async function () {
            try {
                // Ambil data user yang sedang login dari API
                const username = localStorage.getItem('username');

                // Ambil data mahasiswa berdasarkan username dari user
                const mahasiswaResponse = await fetch(`http://localhost:8080/mahasiswa/showName/${username}`);
                if (!mahasiswaResponse.ok) throw new Error("Gagal mengambil data mahasiswa");
                const mahasiswa = await mahasiswaResponse.json();
                console.log("Data dari API:", mahasiswa);
                // Masukkan data ke dalam tabel
                if (mahasiswa.data && mahasiswa.data.length > 0) {
                    const mahasiswaData = mahasiswa.data[0]; // Ambil objek pertama dari array
                    document.getElementById("npm_mhs_sidebar").innerHTML = mahasiswaData.npm || "-";
                    document.getElementById("nama_mhs_sidebar").innerHTML = mahasiswaData.nama_mahasiswa ||  "-";
                    document.getElementById("nama_mhs_navbar").innerHTML = mahasiswaData.nama_mahasiswa ||  "-";

                } else {
     
                    console.log("Data array kosong atau tidak ada:", mahasiswa.data);
                }
            } catch (error) {
                console.error("Terjadi kesalahan:", error);
                
            }
        });

function confirmLogout(event) {
    event.preventDefault(); // Prevent default link behavior
    const confirmation = confirm("Apakah Anda yakin ingin logout?");
    if (confirmation) {
        window.location.href = "/"; // Redirect to logout page
    }
}
</script>
</body>
</html>