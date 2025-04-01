<script>
  function confirmLogout(event) {
    event.preventDefault(); // Mencegah langsung berpindah halaman
    const confirmation = confirm("Apakah Anda yakin ingin logout?");
    if (confirmation) {
      window.location.href = "/"; // Arahkan ke halaman logout jika 'Yes'
    }
  }
</script>
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<div>
  @props(['ADMIN'])
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar: Full tinggi layar tanpa terputus -->
    <aside class="w-64 bg-white border-r border-gray-300 h-screen flex flex-col fixed">
      <!-- Header Sidebar -->
      <div class="text-lg font-bold text-center py-4 bg-blue-600 text-white">
        <a href="dashboard_adm"><img src="{{ asset('img/cuti.png') }}" alt="Profil" class="h-8 mx-auto">
        </a>
      </div>
      <!-- Profil -->
      <div class="flex items-center p-4">
        <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
        <div>
          <h2 class="font-bold text-black">Admin</h2>
        </div>
      </div>
      <!-- Navigasi Sidebar -->
      <nav class="flex flex-col space-y-2 p-4">
        <a href="dashboard_adm" class="py-2 px-4 bg-blue-500 rounded text-white">Dashboard</a>
        <a href="data_mhs" class="py-2 px-4 bg-blue-500 rounded text-white">Mahasiswa</a>
        <a href="data_dsn_wali" class="py-2 px-4 bg-blue-500 rounded text-white">Dosen Wali</a>
        <a href="data_perpus" class="py-2 px-4 bg-blue-500 rounded text-white">Koor Perpustakaan</a>
        <a href="data_jurusan" class="py-2 px-4 bg-blue-500 rounded text-white">Ketua Jurusan</a>
        <a href="data_baup" class="py-2 px-4 bg-blue-500 rounded text-white">BAUP</a>
        <a href="#" onclick="confirmLogout(event)" class="py-2 px-4 mt-2 hover:bg-gray-200 rounded text-black">Logout</a>
      </nav>
    </aside>

    <!-- Main Content: Navbar tetap di atas & konten bisa discroll -->
    <div class="flex-1 flex flex-col ml-64 overflow-hidden"> <!-- ml-64 karena sidebar width nya 64 -->
      <!-- Navbar tetap di atas -->
      <nav class="bg-blue-600 text-white p-3 flex justify-end items-center sticky top-0 z-10 w-full">
        <div class="flex items-center">
          <div class="w-10 h-10 rounded-full bg-gray-300 mr-3"></div>
          <span>Admin</span>
        </div>
        <div>
          <i class="ri-notification-3-fill pr-5 pl-3"></i>
        </div>
      </nav>
      
      <!-- Konten Utama bisa discroll -->
      <div class="p-5 flex-1 overflow-y-auto h-screen">
        {{ $slot }}
      </div>
    </div>
  </div>    
</div>
