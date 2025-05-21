<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Mahasiswa</title>
    <!-- Import Tailwind CSS untuk styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Import stylesheet Choices.js untuk dropdown yang lebih baik -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <!-- Import script Choices.js -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</head>

<body class="bg-gray-100">
    <!-- Container utama form dengan styling putih dan bayangan -->
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Tambah Mahasiswa</h2>
        <!-- Form tambah mahasiswa dengan method POST -->
        <form id="tambah-mahasiswa" action="http://localhost:8080/mahasiswa/" method="POST" class="space-y-4">

            <!-- Input NPM -->
            <div>
                <label for="npm" class="block font-medium">NPM</label>
                <input type="text" id="npm" name="npm" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Dropdown Id Kajur, diisi dengan fetch dari server -->
            <div>
                <label for="id_kajur" class="block font-medium">Kajur</label>
                <select id="id_kajur" name="id_kajur" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Kajur ---</option>
                </select>
            </div>

            <!-- Dropdown Nama Mahasiswa yang terhubung dengan Id User -->
            <div>
                <label for="nama_mahasiswa" class="block font-medium">Nama Mahasiswa</label>
                <select id="nama_mahasiswa" name="nama_mahasiswa" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Mahasiswa ---</option>
                </select>
                <!-- Input Id User otomatis terisi berdasarkan pilihan nama mahasiswa, readonly -->
                <label for="id_user" class="block font-medium pt-4">Id User</label>
                <input type="text" id="id_user" name="id_user" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Input Tempat & Tanggal Lahir -->
            <div>
                <label for="tempat_tanggal_lahir" class="block font-medium">Tempat & Tanggal Lahir</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Radio button untuk Jenis Kelamin -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <div class="mt-1 space-y-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-radio text-indigo-600">
                        <span class="ml-2">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-radio text-indigo-600">
                        <span class="ml-2">Perempuan</span>
                    </label>
                </div>
            </div>

            <!-- Textarea untuk Alamat -->
            <div>
                <label for="alamat" class="block font-medium">Alamat</label>
                <textarea id="alamat" name="alamat" rows="2" required class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <!-- Dropdown pilihan Agama -->
            <div>
                <label for="agama" class="block font-medium">Agama</label>
                <select id="agama" name="agama" required class="mt-1 block w-full p-2 border rounded-md">
                    <option value="">--- Pilih Agama ---</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>

            <!-- Input Angkatan -->
            <div>
                <label for="angkatan" class="block font-medium">Angkatan</label>
                <input type="text" id="angkatan" name="angkatan" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Dropdown Program Studi -->
            <div>
                <label for="program_studi" class="block font-medium">Program Studi</label>
                <select id="program_studi" name="program_studi" required class="mt-1 block w-full p-2 border rounded-md">
                    <option value="">--- Pilih Prodi ---</option>
                    <option value="Teknik Informatika">TI</option>
                    <option value="Teknik Rekayasa Multimedia">TRM</option>
                    <option value="Rekayasa Keamanan Siber">RKS</option>
                    <option value="Teknik Pengendalian Pencemaran Lingkungan">TPPL</option>
                    <option value="Teknik Elektro">TE</option>
                    <option value="Teknik Mesin">TM</option>
                </select>
            </div>

            <!-- Input No HP -->
            <div>
                <label for="no_hp" class="block font-medium">No HP</label>
                <input type="text" id="no_hp" name="no_hp" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Input Email -->
            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Tombol Kembali dan Submit -->
            <div class="flex justify-between mt-4">
                <a href="data_mhs">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Tambah Mahasiswa</button>
            </div>
        </form>
    </div>

    <!-- Script untuk meng-handle submit form dengan fetch API -->
    <script>
        document.getElementById('tambah-mahasiswa').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah reload halaman saat submit
            const form = e.target;
            const formData = new FormData(form);

            // Validasi sederhana: Nama Mahasiswa dan ID User wajib diisi
            const namaMahasiswa = formData.get('nama_mahasiswa');
            const idUser = formData.get('id_user');

            if (!namaMahasiswa || !idUser) {
                alert('Nama Mahasiswa dan ID User harus diisi!');
                return;
            }

            // Kirim data ke server menggunakan fetch
            fetch(form.action, {
                method: form.method,
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    alert('Data berhasil ditambahkan!');
                    window.location.href = "data_mhs"; // Redirect ke halaman data mahasiswa
                } else {
                    return response.json().then(errorData => {
                        alert(`Terjadi kesalahan: ${errorData.message || 'Coba lagi!'}`);
                    });
                }
            })
            .catch(error => {
                alert('Gagal terhubung ke server. Pastikan server berjalan!');
            });
        });
    </script>

    <!-- Script untuk mengambil data Kajur dari server dan mengisi dropdown -->
    <script>
        const kajurDropdown = document.getElementById('id_kajur');
        fetch('http://localhost:8080/kajur/')
            .then(res => res.json())
            .then(data => {
                kajurDropdown.innerHTML = '<option value="">--- Pilih Kajur ---</option>';
                data.forEach(kajur => {
                    const option = document.createElement('option');
                    option.value = kajur.id_kajur;
                    option.textContent = `${kajur.nama_kajur} - ${kajur.nama_jurusan}`;
                    kajurDropdown.appendChild(option);
                });
            });
    </script>

    <!-- Script untuk mengambil data user dengan level mahasiswa dan mengisi dropdown nama mahasiswa -->
    <script>
        const namaMahasiswaSelect = document.getElementById('nama_mahasiswa');
        const idUserInput = document.getElementById('id_user');

        fetch('http://localhost:8080/user/')
            .then(res => res.json())
            .then(data => {
                // Filter data hanya user dengan level 'mahasiswa'
                const mahasiswa = data.filter(user => user.level === 'mahasiswa');
                namaMahasiswaSelect.innerHTML = '<option value="">--- Pilih Mahasiswa ---</option>';
                mahasiswa.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.username;
                    option.textContent = user.username;
                    // Simpan id_user sebagai atribut data pada option
                    option.setAttribute('data-id_user', user.id_user);
                    namaMahasiswaSelect.appendChild(option);
                });
            });

        // Event listener untuk mengisi input id_user ketika nama mahasiswa dipilih
        namaMahasiswaSelect.addEventListener('change', function () {
            const selectedOption = namaMahasiswaSelect.options[namaMahasiswaSelect.selectedIndex];
            const idUser = selectedOption.getAttribute('data-id_user');
            idUserInput.value = idUser || ''; // Jika tidak ada pilihan, kosongkan input
        });
    </script>
</body>

</html>
