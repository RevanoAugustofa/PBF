<script>
document.getElementById("nama_mhs_sidebar").textContent = mahasiswaData.nama_mahasiswa || "-";
                document.getElementById("npm_mhs_sidebar").textContent = mahasiswaData.npm || "-";
                document.getElementById("nama_mhs_navbar").textContent = mahasiswaData.nama_mahasiswa || "-";


  function confirmLogout(event) {
    event.preventDefault(); // Mencegah langsung berpindah halaman
    const confirmation = confirm("Apakah Anda yakin ingin logout?");
    if (confirmation) {
      window.location.href = "/"; // Arahkan ke halaman logout jika 'Yes'
    }
  }
</script>
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
@props(['mahasiswa', 'npm'])

<div class="flex h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-300 h-screen flex flex-col">
    <div class="text-lg font-bold text-center py-4 bg-blue-600 text-white">
      <img src="{{ asset('img/cuti.png') }}" alt="Profil" class="h-8 mx-auto">
  </div>
  

    <!-- Profil -->
    <div class="flex items-center space-x-3 bg-white text-black pt-3 px-4 rounded-lg mb-3">
      <img src="https://i.pravatar.cc/40" alt="Profil" class="w-10 h-10 rounded-full">
      <div>
          <p class="font-semibold">REVANO AUGUSTOFA</p>
          <span class="text-xs bg-gray-500 text-white px-2 py-1 rounded">230102071</span></span>
      </div>
  </div>

  <div class="px-4">
  <hr class="border-t border-gray-300 mb-3 ">
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
        <div class="w-10 h-10 rounded-full bg-gray-300"></div>
        <span id="nama_mhs_navbar">-</span>
        <i class="ri-notification-3-fill text-xl"></i>
      </div>
    </nav>    

    <!-- Konten -->
    <div class="p-5 flex-1 overflow-y-auto">
      {{ $slot }}
    </div>
  </div>
</div>
