<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-blue-600">Login</h2>
        <form class="mt-4" action="dashboard_mhs">
            <div class="mb-4">
                <label class="block text-gray-700">Username*</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Masukkan username">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password*</label>
                <input type="password" class="w-full p-2 border border-gray-300 rounded mt-1 required:border-red-500" placeholder="Masukkan password">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Login</button>
        </form>
    </div>  
</body>
</html>
