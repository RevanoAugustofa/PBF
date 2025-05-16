<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Dosen</title>

    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Kontainer utama form -->
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Tambah Dosen</h2>

        <!-- Form Tambah Dosen -->
        <form id="form-tambah-dosen" action="http://localhost:8080/dosen/" method="POST" class="space-y-4">

            <!-- Dropdown Nama Dosen -->
            <div>
                <label for="nama_dosen" class="block font-medium">Nama Dosen</label>
                <select id="nama_dosen" name="nama_dosen" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Dosen ---</option>
                </select>
            </div>

            <!-- Input NIDN -->
            <div>
                <label for="nidn" class="block font-medium">NIDN</label>
                <input type="text" id="nidn" name="nidn" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Input ID User (readonly & auto-fill) -->
            <div>
                <label for="id_user" class="block font-medium">ID User</label>
                <input type="text" id="id_user" name="id_user" readonly
                    class="w-full p-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between mt-4">
                <!-- Tombol Kembali -->
                <a href="data_dsn_wali">
                    <button type="button"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>

                <!-- Tombol Submit -->
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Tambah Dosen</button>
            </div>
        </form>
    </div>

    <!-- Script interaktif -->
    <script>
        const namaDosenSelect = document.getElementById('nama_dosen');
        const idUserInput = document.getElementById('id_user');

        // Ambil data user dari server (hanya level dosen)
        fetch('http://localhost:8080/user/')
            .then(res => res.json())
            .then(data => {
                // Filter hanya user dengan level 'dosen'
                const dosenUsers = data.filter(user => user.level === 'dosen');

                // Reset dropdown
                namaDosenSelect.innerHTML = '<option value="">--- Pilih Dosen ---</option>';

                // Tambahkan opsi ke dropdown
                dosenUsers.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.username;
                    option.textContent = user.username;
                    option.setAttribute('data-id_user', user.id_user);
                    namaDosenSelect.appendChild(option);
                });
            })
            .catch(err => {
                console.error('Gagal fetch data dosen:', err);
            });

        // Isi otomatis ID User saat dosen dipilih
        namaDosenSelect.addEventListener('change', function () {
            const selected = namaDosenSelect.options[namaDosenSelect.selectedIndex];
            const idUser = selected.getAttribute('data-id_user');
            idUserInput.value = idUser || '';
        });

        // Kirim data form secara asynchronous menggunakan fetch
        document.getElementById('form-tambah-dosen').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah reload form bawaan

            // Ambil data dari form
            const data = {
                nama_dosen: document.getElementById('nama_dosen').value,
                nidn: document.getElementById('nidn').value,
                id_user: document.getElementById('id_user').value
            };

            // Validasi input sederhana
            if (!data.nama_dosen || !data.id_user || !data.nidn) {
                alert("Semua field wajib diisi!");
                return;
            }

            // Kirim data ke server
            fetch(e.target.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(res => {
                    if (res.ok) {
                        alert('Data dosen berhasil ditambahkan!');
                        window.location.href = "data_dsn_wali";
                    } else {
                        return res.json().then(err => {
                            console.error('Detail error dari server:', err);
                            alert(`Terjadi kesalahan: ${err.message || 'Coba lagi!'}`);
                            throw new Error('Terjadi kesalahan');
                        });
                    }
                })
                .catch(err => {
                    console.error('Kesalahan saat menyimpan:', err);
                    alert(err.message || "Gagal menyimpan data.");
                });
        });
    </script>
</body>

</html>
