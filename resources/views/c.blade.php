<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-blue-600">Login</h2>

        <!-- Form Login -->
        <form id="loginForm" class="mt-4">
            <div class="mb-4">
                <label class="block text-gray-700">Username*</label>
                <input type="text" id="username" name="username" 
                       class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                       placeholder="Masukkan username" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password*</label>
                <input type="password" id="password" name="password" 
                       class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                       placeholder="Masukkan password" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Login Sebagai*</label>
                <select id="level" name="level" 
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                        required>
                    <option value="" disabled selected>Pilih peran</option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="baup">BAUP</option>
                    <option value="dosen">Dosen</option>
                    <option value="kajur">Kajur</option>
                    <option value="perpus">Perpus</option>
                </select>
            </div>
  <!-- Tombol Submit -->
  <button type="submit" 
  class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
Login
</button>
</form>
  <!-- Notifikasi Pop-up -->
  <div id="popupNotification" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-4 py-2 rounded shadow-lg opacity-0 transition-all duration-500">
    <span id="popupMessage"></span>
</div>
</div>  

<script>
     const loginForm = document.getElementById('loginForm');
    const popupNotification = document.getElementById('popupNotification');
    const popupMessage = document.getElementById('popupMessage');

 // Rute yang dipetakan berdasarkan level user
 const routesByLevel = {
        admin: 'http://127.0.0.1:8000/Admin/dashboard_adm',
        mahasiswa: 'http://127.0.0.1:8000/Mahasiswa/dashboard_mhs',
        baup: 'http://127.0.0.1:8000/Baup/dashboard_baup',
        dosen: 'http://127.0.0.1:8000/Dosen/dashboard_dsn',
        kajur: 'http://127.0.0.1:8000/Kajur/dashboard_kjur',
        perpus: 'http://127.0.0.1:8000/Perpus/dashboard_prs'
    };

    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Ambil nilai dari input
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        const level = document.getElementById('level').value.trim();
        
        try {
            // Fetch data user dari endpoint
            const response = await fetch('http://localhost:8080/user');
            if (!response.ok) {
                throw new Error('Gagal mengambil data user');
            }
              // Asumsikan response JSON berbentuk array of objects
              const users = await response.json();
               // Cari user yang cocok
            const foundUser = users.find(u => 
                u.username === username &&
                u.password === password &&
                u.level === level
            );

            if (foundUser) {
                // Simpan data ke localStorage
                localStorage.setItem('username', username);
                // localStorage.setItem('level', level);
                 // Jika level user terdaftar di routesByLevel, arahkan ke URL yang sesuai
                 if (routesByLevel[level]) {
                    window.location.href = routesByLevel[level];
                } else {
                    showPopup('Level tidak dikenal!');
                }
            } else {
                // User tidak ditemukan
                showPopup('Username / Password / Level salah!');
            } } catch (error) {
            console.error(error);
            showPopup('Terjadi kesalahan pada server.');
        }
    });

    // Fungsi untuk menampilkan popup
    function showPopup(message) {
        popupMessage.textContent = message;
        popupNotification.style.opacity = '1';
        setTimeout(() => {
            popupNotification.style.opacity = '0';
        }, 3000);
    }
    </script>
</body>
</html>