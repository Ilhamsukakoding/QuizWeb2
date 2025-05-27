<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: index.php");
        exit;
    } else {
        header("Location: user_dashboard.php");
        exit;
    }
}

include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($cek);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect sesuai role
        if ($user['role'] == 'admin') {
            header("Location: index.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4 text-center">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label class="block mb-1">Username</label>
            <input name="username" required class="w-full border px-3 py-2 rounded" placeholder="Username">
        </div>
        <div>
            <label class="block mb-1">Password</label>
            <input name="password" type="password" required class="w-full border px-3 py-2 rounded" placeholder="Password">
        </div>
        <div class="flex justify-between items-center">
            <a href="register.php" class="text-blue-500 text-sm hover:underline">Belum punya akun?</a>
            <button name="login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
        </div>
    </form>
</div>

</body>
</html>
