@props(['mahasiswa', 'npm'])
<div class="flex h-screen">
  <!-- Sidebar: Full tinggi layar tanpa terputus -->
  <aside class="w-64 bg-white border-r border-gray-300 h-screen flex flex-col">
    <!-- Header Sidebar -->
    <div class="text-lg font-bold text-center py-5 bg-blue-600 text-white">
      SIP - Cuti
    </div>
    <!-- Profil -->
    <div class="flex items-center p-4">
      <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
      <div>
        {{-- <h2 class="font-bold text-black">{{ $nama_mahasiswa }}</h2>
        <p class="text-sm bg-gray-300 text-black rounded px-2 inline-block">{{ $npm }}</p> --}}
      </div>
    </div>
    <!-- Navigasi Sidebar -->
    <nav class="px-4">
      <a href="#" class="block py-2 px-4 bg-blue-500 rounded text-white">Dashboard</a>
      <a href="/" class="block py-2 px-4 mt-2 hover:bg-gray-200 rounded text-black">Logout</a>
    </nav>
  </aside>
  
  <!-- Main Content: Navbar tetap di atas & konten bisa discroll -->
  <div class="flex-1 flex flex-col">
    <!-- Navbar tetap di atas -->
    <nav class="bg-blue-600 text-white p-4 flex justify-end items-center sticky top-0 z-10">
      <div class="flex items-center">
        <div class="w-10 h-10 rounded-full bg-gray-300 mr-3"></div>
        {{-- <span>{{ $nama_mahasiswa }}</span> --}}
      </div>
      <div>
        <i class="ri-notification-3-fill pr-5 pl-3"></i>
      </div>
    </nav>
    
    <!-- Konten Utama bisa discroll -->
    <div class="p-5 flex-1 overflow-y-auto">
      {{ $slot }}
    </div>
  </div>
</div>
