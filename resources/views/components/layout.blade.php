@props(['username', 'nim'])
<div class="sticky top-0">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <div class="text-lg font-bold">SIP - Cuti</div>
        <div class="flex items-center">
            <div class="w-10 h-10 rounded-full bg-gray-300 mr-3"></div>
            <span>{{ $username }}</span>
            <div><i class="ri-notification-3-fill pr-5 pl-3"></i></div>
        </div>
    </nav>
    
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white text-white p-5 min-h-screen">
            <div class="flex items-center mb-8 text-black">
                <div class="w-12 h-12 rounded-full bg-gray-300 mr-3"></div>
                <div>
                    <h2 class="font-bold">{{ $username }}</h2>
                    <p class="text-sm bg-gray-300 rounded px-2 inline-block">{{ $nim }}</p>
                </div>
            </div>
            <nav>
                <a href="#" class="block py-2 px-4 bg-blue-500 rounded">Dashboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-300 text-black rounded mt-2">Logout</a>
            </nav>
        </div>
        <div class="p-5 w-full"> <!-- Konten utama -->
            {{ $slot }}
        </div>
    </div>
</div>