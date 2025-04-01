<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-screen-lg mx-auto bg-white p-6 mt-10 mb-10 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Tambah Dosen</h2>
        <form action="http://localhost/api/tambah_dosen" method="POST" class="space-y-4">
            <!-- Nama Dosen -->
            <div>
                <label for="nama_dosen" class="block font-medium">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- NIDN -->
            <div>
                <label for="nidn" class="block font-medium">NIDN</label>
                <input type="text" id="nidn" name="nidn" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- ID User -->
            <div>
                <label for="id_user" class="block font-medium">ID User</label>
                <input type="text" id="id_user" name="id_user" required class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- Submit Button -->
            <div class="flex justify-between mt-4">
                <a href="data_dsn_wali">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Tambah Dosen</button>
            </div>
        </form>

    </div>
    <script>
     fetch("http://localhost/api/tambah_dosen", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(dataDosen)
})

    </script>
</body>

</html>
