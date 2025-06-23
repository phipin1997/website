<?php
$host     = "sql311.infinityfree.com";
$user     = "if0_39035494";
$pass = "MCRSzN2pPGG";
$db = "if0_39035494_calon_siswa_mediatek";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
