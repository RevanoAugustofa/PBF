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
      <div class="flex items-center space-x-4 p-4">
        <img src="{{ asset('img/profile.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full">
        <div>
          <h2 class="font-bold text-black">Admin</h2>
        </div>
      </div>
      <!-- Navigasi Sidebar -->
      <nav class="flex flex-col space-y-2 p-4">
        <a href="dashboard_adm" class="py-2 px-4 bg-blue-500 rounded text-white"><i class="ri-dashboard-horizontal-fill pr-5"></i>Dashboard</a>
        <a href="data_mhs" class="py-2 px-4 bg-blue-500 rounded text-white">Mahasiswa</a>
        <a href="data_jurusan" class="py-2 px-4 bg-blue-500 rounded text-white">Ketua Jurusan</a>
        <a href="#" onclick="confirmLogout(event)" class="py-2 px-4 mt-2 hover:bg-gray-200 rounded text-black"><i class="ri-shut-down-line pr-5"></i>Logout</a>
      </nav>
    </aside>

    <!-- Main Content: Navbar tetap di atas & konten bisa discroll -->
    <div class="flex-1 flex flex-col ml-64 overflow-hidden"> <!-- ml-64 karena sidebar width nya 64 -->
      <!-- Navbar tetap di atas -->
      <nav class="bg-blue-600 text-white p-3 flex justify-end items-center sticky top-0 z-10 w-full">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('img/profile.jpg') }}" alt="Profil" class="w-10 h-10 rounded-full">
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
