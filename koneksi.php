<?php
// koneksi.php
$conn = mysqli_connect("localhost", "root", "", "web");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>