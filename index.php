<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION["role"];
$namaRole = ucfirst($role);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard PSB - SMK Mediateknologi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #f0f8ff, #dbeaff);
            min-height: 100vh;
            padding: 20px;
        }
        header {
            background-color: #003366;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        header h1 {
            margin-bottom: 10px;
        }
        .role-info {
            font-size: 0.9em;
            color: #e0e0e0;
        }
        nav {
            background: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        nav a {
            background-color: #0055aa;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            transition: background 0.3s ease;
            font-weight: bold;
        }
        nav a:hover {
            background-color: #003f7f;
        }
        .logout {
            display: inline-block;
            margin-top: 30px;
            text-align: center;
        }
        .logout a {
            color: #555;
            background: #ffdddd;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.2s ease;
            font-weight: bold;
        }
        .logout a:hover {
            background: #ffaaaa;
        }
    </style>
</head>
<body>

    <header>
        <h1>Portal PSB SMK Mediateknologi</h1>
        <div class="role-info">Login sebagai: <strong><?= $namaRole ?></strong></div>
    </header>

    <nav>
        <ul>
            <li><a href="from_pendaftaran.php">Form Pendaftaran</a></li>
            <?php if ($role == "admin"): ?>
                <li><a href="edit_daftar_berkas.php">Kelola Data Berkas</a></li>
                <li><a href="edit_daftar_calon_siswa.php">Kelola Calon Siswa</a></li>
            <?php else: ?>
                <li><a href="upload_daftar_berkas.php">Upload Data Berkas</a></li>
                <li><a href="daftar_calon_siswa.php">Lihat Calon Siswa</a></li>
            <?php endif; ?>
        </ul>
        <div class="logout">
            <a href="logout.php">🔒 Logout</a>
        </div>
    </nav>

</body>
</html>

