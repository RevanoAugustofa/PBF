<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Edit Mahasiswa</h2>
        <form id="edit-mahasiswa" class="space-y-4">
            <!-- NPM -->
            <div>
                <label for="npm" class="block font-medium">NPM</label>
                <input type="text" id="npm" name="npm" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <!-- ID Kajur -->
            <div>
                <label for="id_kajur" class="block font-medium">ID KAJUR</label>
                <select id="id_kajur" name="id_kajur" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Kajur ---</option>
                </select>
            </div>
            <!-- Nama Mahasiswa (Dropdown) -->
            <div>
                <label for="nama_mahasiswa" class="block font-medium">Nama Mahasiswa</label>
                <select id="nama_mahasiswa" name="nama_mahasiswa" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Mahasiswa ---</option>
                </select>
                <input type="text" id="id_user" name="id_user" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
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
                <a href="/Admin/data_mhs">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Update Mahasiswa</button>
            </div>
        </form>
    </div>

    <script>
    //ketika menekan tombol edit maka id mahasiswa akan terdapat pada url 
    const urlParams = new URLSearchParams(window.location.search);
    const mahasiswaId = urlParams.get('id');

    let mhsData = null;

    // Fetch data mahasiswa terlebih dahulu
    const fetchMahasiswa = async () => {
        try {
            const res = await fetch(`http://localhost:8080/mahasiswa/${mahasiswaId}`);
            const data = await res.json();
            mhsData = Array.isArray(data) ? data[0] : data.data || data;
            console.log(mhsData)

            // Isi input selain dropdown
            document.getElementById('npm').value = mhsData.npm || '';
            document.getElementById('tempat_tanggal_lahir').value = mhsData.tempat_tanggal_lahir || '';
            document.getElementById('alamat').value = mhsData.alamat || '';
            document.getElementById('angkatan').value = mhsData.angkatan || '';
            document.getElementById('no_hp').value = mhsData.no_hp || '';
            document.getElementById('email').value = mhsData.email || '';
            document.getElementById('program_studi').value = mhsData.program_studi || '';
            document.getElementById('agama').value = mhsData.agama || '';
            document.getElementById('id_user').value = mhsData.id_user || '';
            if (mhsData.jenis_kelamin) {
            const jkRadio = document.querySelector(`input[name="jenis_kelamin"][value="${mhsData.jenis_kelamin}"]`);
            if (jkRadio) {
                jkRadio.checked = true;
            } else {
                console.warn('Value jenis_kelamin tidak cocok dengan input radio:', mhsData.jenis_kelamin);
            }
        }

        } catch (error) {
            alert('Gagal memuat data mahasiswa.');
            console.error(error);
        }
    };


    // Fetch dropdown kajur
    const fetchKajur = async () => {
        const res = await fetch('http://localhost:8080/kajur/');
        const data = await res.json();
        const dropdown = document.getElementById('id_kajur');
        dropdown.innerHTML = '<option value="">--- Pilih Kajur ---</option>';
        data.forEach(k => {
            const opt = document.createElement('option');
            opt.value = k.id_kajur;
            opt.textContent = `${k.nama_kajur} - ${k.nama_jurusan}`;
            dropdown.appendChild(opt);
        });
        if (mhsData) dropdown.value = mhsData.id_kajur || '';
    };

    // Fetch dropdown nama mahasiswa
    const fetchUser = async () => {
        const res = await fetch('http://localhost:8080/user/');
        const data = await res.json();
        const dropdown = document.getElementById('nama_mahasiswa');
        dropdown.innerHTML = '<option value="">--- Pilih Mahasiswa ---</option>';
        data.filter(u => u.level === 'mahasiswa').forEach(u => {
            const opt = document.createElement('option');
            opt.value = u.username;
            opt.textContent = u.username;
            opt.setAttribute('data-id_user', u.id_user);
            dropdown.appendChild(opt);
        });

        // memberikan value berupa id user
        if (mhsData) {
            const targetOption = Array.from(dropdown.options).find(opt => opt.getAttribute('data-id_user') === String(mhsData.id_user));
            if (targetOption) {
                dropdown.value = targetOption.value;
            }
        }

        // Listener ketika user ganti pilihan
        dropdown.addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            document.getElementById('id_user').value = selected.getAttribute('data-id_user') || '';
        });
    };

    // Inisialisasi semua setelah DOM/html siap
    document.addEventListener('DOMContentLoaded', async () => {
        await fetchMahasiswa();
        await Promise.all([fetchKajur(), fetchUser()]);
    });

    //fetch put 
    document.getElementById('edit-mahasiswa').addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    try {
        const res = await fetch(`http://localhost:8080/mahasiswa/${mahasiswaId}`, {
            method: 'PUT',
            body: new URLSearchParams(formData), // untuk x-www-form-urlencoded
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });

        if (!res.ok) throw new Error('Gagal update data');
        alert('Data berhasil diupdate');
        window.location.href = '/Admin/data_mhs';
    } catch (err) {
        alert('Terjadi kesalahan');
        console.error(err);
    }
});

</script>

</body>
</html>
