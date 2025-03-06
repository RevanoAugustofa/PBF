<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <x-layout_admin > 
      <div class="flex-1 p-6">
        <div class="mt-4">
            <p class="text-gray-600">> Data Mahasiswa</p>
            <h2 class="text-2xl font-bold">Mahasiswa <span class="text-gray-600 text-sm">Riwayat berhenti studi mahasiswa.</span></h2>
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
                <div class="bg-gray-200 h-48 w-48 flex items-center justify-center mr-6 mb-4 md:mb-0">
                    <span>Foto</span>
                </div>
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
    </x-layout_admin > 
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIP - Cuti</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen w-screen">
  <!-- Header -->
 

  <!-- Container Layout -->
  <div class="flex h-[calc(100%-4rem)]">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-300">
        <div class="text-xl text-center bg-blue-400 p-[30px] font-bold">SIP - Cuti</div>
      <!-- Profil Admin -->
      <div class="flex items-center mb-6  p-4 ">
        <img src="https://via.placeholder.com/60" alt="Avatar Admin" class="w-12 h-12 rounded-full mr-3">
        <div>
          <p class="font-bold">ADMIN</p>
          <p class="text-xs">230102071</p>
        </div>
      </div>

      <!-- Menu Navigasi -->
      <nav class="space-y-2">
        <a href="#" class="block bg-gray-200 px-4 py-2 rounded">Dashboard</a>
        <a href="#" class="block hover:bg-gray-200 px-4 py-2 rounded">Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white p-0">
        <header class="bg-yellow-600 text-white p-[28px] flex flex-row-reverse items-center justify-between">
 
            <!-- (Opsional) Tempat avatar user di header -->
            <div class="flex items-center space-x-2">
              <!-- Bisa ganti link gambar -->
              <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-8 h-8 rounded-full">
            </div>
          </header>
      <!-- Breadcrumb -->
      <div class="p-4">
      <p class="text-gray-500 text-sm mb-2">> Data Mahasiswa</p>

      <!-- Tab Menu + Search -->
      <div class="flex items-center justify-between border-b border-gray-300 pb-1">
        <div class="space-x-4">
          <button class="pb-2 border-b-2 border-blue-500 font-semibold text-sm">
            Data Mahasiswa
          </button>
          <button class="pb-2 text-gray-500 text-sm">
            Pengajuan Cuti
          </button>
        </div>
        <div>
          <input
            type="text"
            placeholder="Cari Mahasiswa"
            class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring focus:ring-blue-200"
          />
        </div>
      </div>

      <!-- Tabel / Data Mahasiswa -->
      <div class="mt-4 bg-gray-100 border border-gray-300 rounded h-64 flex items-center justify-center text-gray-500 text-sm">
       
      </div>
    </div>
    </main>
  </div>
</body>
</html> --}}
