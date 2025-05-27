<?php
// hapus.php (ADMIN)
include "auth.php";
if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak!";
    exit;
}
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location: index.php");
?>
