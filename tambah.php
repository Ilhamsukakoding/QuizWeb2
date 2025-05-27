<?php
// tambah.php (ADMIN)
include "auth.php";
if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak!";
    exit;
}
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "upload/$foto");

    mysqli_query($conn, "INSERT INTO users (username, password, foto, role) VALUES ('$username', '$password', '$foto', 'user')");
    header("Location: index.php");
}
?>