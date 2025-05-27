<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Registrasi</h2>

    <form action="proses_register.php" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block mb-1">Username</label>
            <input type="text" name="username" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Foto Profil</label>
            <input type="file" name="foto" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Role</label>
            <select name="role" required class="w-full border px-3 py-2 rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="flex justify-between items-center">
            <a href="login.php" class="text-sm text-gray-500 hover:underline">← Sudah punya akun?</a>
            <input type="submit" value="Daftar" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        </div>
    </form>
</div>

</body>
</html>
