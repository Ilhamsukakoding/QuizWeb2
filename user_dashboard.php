<?php
// user_dashboard.php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded shadow-md text-center">
    <h1 class="text-2xl font-bold mb-2">Halo, <?= $_SESSION['username']; ?>!</h1>
    <p class="mb-4">Anda login sebagai <strong>user</strong>.</p>
    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
</div>

</body>
</html>
