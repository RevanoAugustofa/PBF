<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Edit Mahasiswa</h2>
        <form id="edit-mahasiswa" action="http://localhost:8080/mahasiswa/{id}" method="POST" class="space-y-4">
             <!-- NPM -->
             <div>
                <label for="npm" class="block font-medium">NPM</label>
                <input type="text" id="npm" name="npm" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- ID USER -->
            <div>
                <label for="id_user" class="block font-medium">ID USER</label>
                <input type="number" id="id_user" name="id_user" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- ID DOSEN -->
            <div>
                <label for="id_dosen" class="block font-medium">ID DOSEN</label>
                <input type="number" id="id_dosen" name="id_dosen" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- ID KAJUR -->
            <div>
                <label for="id_kajur" class="block font-medium">ID KAJUR</label>
                <input type="number" id="id_kajur" name="id_kajur" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Nama Mahasiswa -->
            <div>
                <label for="nama_mahasiswa" class="block font-medium">Nama Mahasiswa</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Tempat & Tanggal Lahir -->
            <div>
                <label for="tempat_tanggal_lahir" class="block font-medium">Tempat & Tanggal Lahir</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Jenis Kelamin -->
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
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
        
            <!-- Alamat -->
            <div>
                <label for="alamat" class="block font-medium">Alamat</label>
                <textarea id="alamat" name="alamat" rows="2" required class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>
        
            <!-- Agama -->
            <div>
                <label for="agama" class="block font-medium">Agama</label>
                <select id="agama" name="agama" required class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">--- Pilih Agama ---</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
        
            <!-- Angkatan -->
            <div>
                <label for="angkatan" class="block font-medium">Angkatan</label>
                <input type="text" id="angkatan" name="angkatan" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Program Studi -->
            <div>
                <label for="program_studi" class="block font-medium">Program Studi</label>
                <select id="program_studi" name="program_studi" required class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">--- Pilih Prodi ---</option>
                    <option value="Teknik Informatika">TI</option>
                    <option value="Teknik Rekayasa Multimedia">TRM</option>
                    <option value="Rekayasa Keamanan Siber">RKS</option>
                    <option value="Teknik Pengendalian Pencemaran Lingkungan">TPPL</option>
                </select>
            </div>
        
            <!-- Semester -->
            <div>
                <label for="semester" class="block font-medium">Semester</label>
                <input type="number" id="semester" name="semester" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- No HP -->
            <div>
                <label for="no_hp" class="block font-medium">No HP</label>
                <input type="text" id="no_hp" name="no_hp" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Email -->
            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
        
            <!-- Submit Button -->
            <div class="flex justify-between mt-4">
                <a href="../data_mhs">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Tambah Mahasiswa</button>
            </div>
        </form>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const urlParams = new URLSearchParams(window.location.search);
                const idMahasiswa = urlParams.get('id'); // Ambil ID dari URL
            
                if (!idMahasiswa) {
                    alert("ID Mahasiswa tidak ditemukan!");
                    window.location.href = "data_mhs";
                    return;
                }
            
                // Fetch data mahasiswa untuk ditampilkan di form
                fetch(`http://localhost:8080/mahasiswa/${idMahasiswa}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Data dari API:", data); // Cek di console apakah datanya muncul

                    if (!data) {
                        alert("Data mahasiswa tidak ditemukan!");
                        window.location.href = "data_mhs";
                        return;
                    }

            
                        document.getElementById('npm').value = data.npm;
                        document.getElementById('id_user').value = data.id_user;
                        document.getElementById('id_dosen').value = data.id_dosen;
                        document.getElementById('id_kajur').value = data.id_kajur;
                        document.getElementById('nama_mahasiswa').value = data.nama_mahasiswa;
                        document.getElementById('tempat_tanggal_lahir').value = data.tempat_tanggal_lahir;
                        document.querySelector(`input[name="jenis_kelamin"][value="${data.jenis_kelamin}"]`).checked = true;
                        document.getElementById('alamat').value = data.alamat;
                        document.getElementById('agama').value = data.agama;
                        document.getElementById('angkatan').value = data.angkatan;
                        document.getElementById('program_studi').value = data.program_studi;
                        document.getElementById('semester').value = data.semester;
                        document.getElementById('no_hp').value = data.no_hp;
                        document.getElementById('email').value = data.email;
                    })
                    .catch(error => console.error("Error fetching mahasiswa data:", error));
            
                // Handle Form Submit
                document.getElementById('edit-mahasiswa').addEventListener('submit', function (e) {
                    e.preventDefault();
            
                    const form = e.target;
                    const formData = new FormData(form);
                    const jsonData = Object.fromEntries(formData);
                    jsonData._method = "PUT"; // Laravel butuh _method untuk PATCH/PUT
            
                    fetch(`http://localhost:8000/mahasiswa/${idMahasiswa}`, {
                        method: 'POST', // Laravel tidak menerima PUT langsung, gunakan POST
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(jsonData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Data berhasil diperbarui!');
                            window.location.href = "data_mhs";
                        } else {
                            alert('Terjadi kesalahan: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat mengupdate data.');
                    });
                });
            });
            </script>
            
    </div>
</body>

</html>