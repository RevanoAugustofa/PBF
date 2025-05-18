<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ketua Jurusan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Edit Ketua Jurusan</h2>
        <form id="edit-kajur" class="space-y-4">
            <div>
                <label for="id_kajur" class="block font-medium">ID Ketua Jurusan</label>
                <input type="text" id="id_kajur" name="id_kajur" required class="w-full p-2 border border-gray-300 rounded-md" readonly>
            </div>

            <div>
                <label for="nama_kajur" class="block font-medium">Nama Ketua Jurusan</label>
                <select id="nama_kajur" name="nama_kajur" required class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">--- Pilih Ketua Jurusan ---</option>
                </select>

                <label for="id_user" class="block font-medium pt-4">ID User</label>
                <input type="text" id="id_user" name="id_user" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
            </div>

            <div>
                <label for="nama_jurusan" class="block font-medium">Nama Jurusan</label>
                <input type="text" id="nama_jurusan" name="nama_jurusan" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label for="nidn" class="block font-medium">NIDN</label>
                <input type="text" id="nidn" name="nidn" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="flex justify-between mt-4">
                <a href="data_kajur">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Update Kajur</button>
            </div>
        </form>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const kajurId = urlParams.get('id');
        let kajurData = null;

        const fetchUser = async () => {
            const res = await fetch('http://localhost:8080/user/');
            const data = await res.json();
            const dropdown = document.getElementById('nama_kajur');
            dropdown.innerHTML = '<option value="">--- Pilih Ketua Jurusan ---</option>';

            data.filter(u => u.level === 'kajur').forEach(u => {
                const opt = document.createElement('option');
                opt.value = u.username;
                opt.textContent = u.username;
                opt.setAttribute('data-id_user', u.id_user);
                dropdown.appendChild(opt);
            });

            dropdown.addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                document.getElementById('id_user').value = selected.getAttribute('data-id_user') || '';
            });
        };

        const fetchKajur = async () => {
    try {
        const res = await fetch(`http://localhost:8080/kajur/${kajurId}`);
        const data = await res.json();
        console.log("DATA KAJUR:", data);
        kajurData = data[0]; // <-- ini penting

        // Isi input biasa
        document.getElementById('id_kajur').value = kajurData.id_kajur || '';
        document.getElementById('nama_jurusan').value = kajurData.nama_jurusan || '';
        document.getElementById('nidn').value = kajurData.nidn || '';
        document.getElementById('id_user').value = kajurData.id_user || '';

        // Tunggu sampai dropdown siap dan set dropdown + id_user input
        const dropdown = document.getElementById('nama_kajur');
        const checkInterval = setInterval(() => {
            const targetOption = Array.from(dropdown.options).find(opt =>
                opt.getAttribute('data-id_user') === String(kajurData.id_user)
            );
            if (targetOption) {
                dropdown.value = targetOption.value;
                document.getElementById('id_user').value = targetOption.getAttribute('data-id_user') || '';
                clearInterval(checkInterval);
            }
        }, 100);

    } catch (error) {
        alert('Gagal memuat data Kajur.');
        console.error(error);
    }
};


        document.addEventListener('DOMContentLoaded', async () => {
            await fetchUser();
            await fetchKajur();
        });

       document.getElementById('edit-kajur').addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    try {
        const res = await fetch(`http://localhost:8080/kajur/${kajurId}`, {
            method: 'PUT',
            body: new URLSearchParams(formData),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });

        if (!res.ok) {
            const errorData = await res.json();
            console.error("Response Error:", errorData);
            throw new Error('Gagal update data');
        }
        alert('Data berhasil diupdate');
        window.location.href = '/Admin/data_jurusan';
    } catch (error) {
        alert('Gagal mengupdate data.');
        console.error(error);
    }
});

    </script>
</body>
</html>
