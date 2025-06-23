<?php
session_start();

// Jika belum login, redirect ke login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

// Ambil role dari session
$role = $_SESSION["role"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SMK Mediateknologi - Penerimaan Siswa Baru</title>
    <style>
        body { font-family: sans-serif; background: #eef2f7; padding: 20px; }
        h1 { text-align: center; }
        ul { list-style: none; padding: 0; display: flex; justify-content: center; gap: 20px; }
        a { padding: 10px 20px; background: #0077cc; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background: #005fa3; }
        .logout { position: absolute; right: 20px; top: 20px; }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a>
    <h1>Selamat Datang di Portal PSB SMK Mediateknologi</h1>
    <ul>
        <li><a href="form_pendaftaran.php">Form Pendaftaran</a></li>

        <?php if ($role == "admin"): ?>
            <li><a href="edit_daftar_berkas.php">Data Berkas</a></li>
            <li><a href="edit_daftar_calon_siswa.php">Data Calon Siswa</a></li>
        <?php else: ?>
            <li><a href="daftar_berkas.php">Data Berkas</a></li>
            <li><a href="daftar_calon_siswa.php">Data Calon Siswa</a></li>
        <?php endif; ?>
    </ul>
</body>
</html>

