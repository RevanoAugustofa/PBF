<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Pengaturan karakter dan responsive viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Pemanggilan Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="flex flex-col items-center justify-center h-screen bg-gray-100">
    
    <!-- Logo Aplikasi -->
    <div class="mb-10">
        <!-- Menggunakan directive Laravel Blade untuk mengambil gambar logo -->
        <img src="{{ asset('img/cuti1.png') }}" alt="Sip Cuti Logo" class="h-24">
    </div>

    <!-- Card Login -->
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <!-- Judul Form -->
        <h2 class="text-xl font-bold text-center text-blue-600">Login</h2>
        
        <!-- Formulir Login -->
        <form id="loginForm" class="mt-4">
            <!-- Input Username -->
            <div class="mb-4">
                <label class="block text-gray-700">Username*</label>
                <input type="text" id="username" name="username" 
                       class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                       placeholder="Masukkan username" required>
            </div>
            
            <!-- Input Password -->
            <div class="mb-4">
                <label class="block text-gray-700">Password*</label>
                <input type="password" id="password" name="password" 
                       class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                       placeholder="Masukkan password" required>
            </div>
            
            <!-- Pilihan Level Login -->
            <div class="mb-4">
                <label class="block text-gray-700">Login Sebagai*</label>
                <select id="level" name="level" 
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring focus:ring-blue-200" 
                        required>
                    <option value="" disabled selected>Pilih peran</option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="kajur">Kajur</option>
                </select>
            </div>
            
            <!-- Tombol Submit -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
                Login
            </button>
        </form>

        <!-- Pop-up Notifikasi untuk Error -->
        <div id="popupNotification" 
             class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-4 py-2 rounded shadow-lg opacity-0 transition-all duration-500">
            <span id="popupMessage"></span>
        </div>
    </div>  

    <!-- Footer Halaman -->
    <footer class="w-full fixed bottom-0 text-center py-4 mt-6 bg-gray-200 text-gray-700">
        <p>&copy; 2025 Sistem Pengajuan Cuti Mahasiswa. All Rights Reserved.</p>
    </footer>

    <!-- Script Login -->
    <script>
        // Ambil elemen form dan elemen pop-up
        const loginForm = document.getElementById('loginForm');
        const popupNotification = document.getElementById('popupNotification');
        const popupMessage = document.getElementById('popupMessage');

        // Definisikan rute tujuan berdasarkan level pengguna
        const routesByLevel = {
            admin: '/Admin/dashboard_adm',
            mahasiswa: '/Mahasiswa/dashboard_mhs',
            kajur: '/Kajur/dashboard_kajur',
        };

        // Tangani submit form login
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault(); // Cegah reload halaman default
            
            // Ambil input dari form
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const level = document.getElementById('level').value.trim();
            
            try {
                // Ambil data user dari server lokal
                const response = await fetch('http://localhost:8080/user');
                if (!response.ok) {
                    throw new Error('Gagal mengambil data user');
                }
                
                // Konversi hasil fetch ke array of objects
                const users = await response.json();
                
                // Cari user yang cocok berdasarkan input
                const foundUser = users.find(u => 
                    u.username === username &&
                    u.password === password &&
                    u.level === level
                );

                if (foundUser) {
                    // Simpan data user ke localStorage
                    localStorage.setItem('username', username);
                    localStorage.setItem('nama_mahasiswa', foundUser.nama_mahasiswa);
                    localStorage.setItem('npm_mahasiswa', foundUser.npm);
                    
                    // Redirect ke dashboard sesuai level
                    if (routesByLevel[level]) {
                        window.location.href = routesByLevel[level];
                    } else {
                        showPopup('Level tidak dikenal!');
                    }
                } else {
                    // Tidak ditemukan user yang cocok
                    showPopup('Username / Password / Level salah!');
                }
            } catch (error) {
                console.error(error);
                showPopup('Terjadi kesalahan pada server.');
            }
        });

        // Fungsi untuk menampilkan notifikasi popup
        let popupTimeout;
        function showPopup(message) {
            clearTimeout(popupTimeout); // Reset timer jika popup sebelumnya masih aktif
            popupMessage.textContent = message;
            popupNotification.style.opacity = '1'; // Tampilkan
            popupTimeout = setTimeout(() => {
                popupNotification.style.opacity = '0'; // Sembunyikan setelah 3 detik
            }, 3000);
        }
    </script>
</body>
</html>
