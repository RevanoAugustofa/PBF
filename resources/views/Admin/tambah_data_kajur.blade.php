<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Kajur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Tambah Ketua Jurusan</h2>
        <form id="tambah-kajur" action="http://localhost:8080/kajur/" method="POST" class="space-y-4">

            <!-- ID Kajur -->
            <div>
                <label for="id_kajur" class="block font-medium">ID Ketua Jurusan</label>
                <input type="text" id="id_kajur" name="id_kajur" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Nama Kajur -->
            <div>
                <label for="nama_kajur" class="block font-medium">Nama Ketua Jurusan</label>
                <select id="nama_kajur" name="nama_kajur" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Ketua Jurusan ---</option>
                </select>
            </div>

            <!-- Nama Jurusan -->
            <div>
                <label for="nama_jurusan" class="block font-medium">Nama Jurusan</label>
                <input type="text" id="nama_jurusan" name="nama_jurusan" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- ID User -->
            <div>
                <label for="id_user" class="block font-medium">ID User</label>
                <input type="text" id="id_user" name="id_user" readonly disabled class="w-full p-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
            </div>

            <!-- Tombol -->
            <div class="flex justify-between mt-4">
                <a href="data_kajur">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Tambah Kajur</button>
            </div>
        </form>
    </div>

    <!-- Script Fetch & Auto ID -->
    <script>
        const namaKajurSelect = document.getElementById('nama_kajur');
        const idUserInput = document.getElementById('id_user');

        fetch('http://localhost:8080/user/')
            .then(res => res.json())
            .then(data => {
                const kajurUsers = data.filter(user => user.level === 'kajur');
                namaKajurSelect.innerHTML = '<option value="">--- Pilih Ketua Jurusan ---</option>';
                kajurUsers.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.username;
                    option.textContent = user.username;
                    option.setAttribute('data-id_user', user.id_user);
                    namaKajurSelect.appendChild(option);
                });
            });

        namaKajurSelect.addEventListener('change', function () {
            const selectedOption = namaKajurSelect.options[namaKajurSelect.selectedIndex];
            const idUser = selectedOption.getAttribute('data-id_user');
            idUserInput.value = idUser || '';
        });
    </script>

    <!-- Script Submit -->
    <script>
        document.getElementById('tambah-kajur').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);

            const namaKajur = formData.get('nama_kajur');
            const idUser = formData.get('id_user');

            if (!namaKajur || !idUser) {
                alert('Nama Kajur dan ID User harus diisi!');
                return;
            }

            fetch(form.action, {
                method: form.method,
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    alert('Data Kajur berhasil ditambahkan!');
                    window.location.href = "data_kajur";
                } else {
                    return response.json().then(error => {
                        alert(`Terjadi kesalahan: ${error.message || 'Coba lagi!'}`);
                    });
                }
            })
            .catch(() => {
                alert('Gagal terhubung ke server!');
            });
        });
    </script>
</body>

</html>
