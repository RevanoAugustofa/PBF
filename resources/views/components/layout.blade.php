@props(['username', 'nim'])
<div class="flex h-screen">
  <!-- Sidebar: Full tinggi layar -->
  <aside class="w-64 bg-white border-r border-gray-300 sticky top-0">
    <!-- Header Sidebar -->
    <div class="text-lg font-bold text-center py-4 bg-blue-500 text-white">
      SIP - Cuti
    </div>
    <!-- Profil -->
    <div class="flex items-center p-4">
      <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
      <div>
        <h2 class="font-bold text-black">{{ $username }}</h2>
        <p class="text-sm bg-gray-300 text-black rounded px-2 inline-block">{{ $nim }}</p>
      </div>
    </div>
    <!-- Navigasi Sidebar -->
    <nav class="px-4">
      <a href="#" class="block py-2 px-4 bg-blue-500 rounded text-white">Dashboard</a>
      <a href="#" class="block py-2 px-4 mt-2 hover:bg-gray-200 rounded text-black">Logout</a>
    </nav>
  </aside>
  
  <!-- Main Content: Navbar + Konten Utama -->
  <div class="flex-1 flex flex-col">
    <!-- Navbar khusus untuk konten utama -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
      <div class="flex items-center">
        <div class="w-10 h-10 rounded-full bg-gray-300 mr-3"></div>
        <span>{{ $username }}</span>
      </div>
      <div>
        <i class="ri-notification-3-fill pr-5 pl-3"></i>
      </div>
    </nav>
    
    <!-- Konten Utama -->
    <div class="p-5 flex-1">
      {{ $slot }}
    </div>
  </div>
</div>
