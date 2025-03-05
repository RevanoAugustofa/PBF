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
            @csrf
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
                <label class="block text-gray-700">Level*</label>
                <input type="text" id="level" name="level" 
                       class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                       placeholder="Misal: admin/mahasiswa/baup/dosen/kajur/perpus" required>
            </div>
            
            <!-- Tombol Submit -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
                Login
            </button>
        </form>
        
        <!-- Pesan Error -->
        <p id="errorMessage" class="text-red-500 text-sm mt-2 hidden"></p>
    </div>  

    <script>
        const loginForm = document.getElementById('loginForm');
        const errorMessage = document.getElementById('errorMessage');
        
        // Rute yang dipetakan berdasarkan level user
        const routesByLevel = {
            admin: '/Admin/dashboard_adm',
            mahasiswa: '/mahasiswa/dashboard',
            baup: '/baup/dashboard',
            dosen: '/dosen/dashboard',
            kajur: '/kajur/dashboard',
            perpus: '/perpus/dashboard'
        };

        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            errorMessage.classList.add('hidden');
            
            // Ambil nilai dari input
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const level    = document.getElementById('level').value.trim();
            
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
                    // Jika level user terdaftar di routesByLevel, arahkan ke URL yang sesuai
                    if (routesByLevel[level]) {
                        window.location.href = routesByLevel[level];
                    } else {
                        errorMessage.textContent = 'Level tidak dikenal!';
                        errorMessage.classList.remove('hidden');
                    }
                } else {
                    // User tidak ditemukan
                    errorMessage.textContent = 'Username / Password / Level salah!';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                console.error(error);
                errorMessage.textContent = 'Terjadi kesalahan pada server.';
                errorMessage.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>
