<?php
include "koneksi.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role']; // Ambil role dari form

$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tipe_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];

$path = "upload/" . $nama_file;

if (move_uploaded_file($tmp_file, $path)) {
    $sql = "INSERT INTO users (username, password, foto, role) VALUES ('$username', '$password', '$nama_file', '$role')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: login.php");
        exit;
    } else {
        echo "Gagal mendaftar. Silakan coba lagi.";
    }
} else {
    echo "Gagal upload foto.";
}
