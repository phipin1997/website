<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include "koneksi.php";
$nisnList = $conn->query("SELECT nisn, nama_lengkap FROM calon_siswa_mediatek ORDER BY nisn ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload Berkas Pendaftaran</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background: #f1f5f9;
            display: flex;
        }

        .container {
            flex: 1;
            padding: 40px;
            box-sizing: border-box;
        }

        .content-box {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin-top: 15px;
        }

        input[type="file"], select {
            margin-top: 5px;
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn-upload {
            padding: 10px 20px;
            background-color: #0077cc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-upload:hover {
            background-color: #005fa3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
            text-align: center;
        }

        th {
            background-color: #0077cc;
            color: white;
        }

        #status {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="container">
        <div class="content-box">
            <h2>Upload Berkas Calon Siswa</h2>

            <form id="formUpload" enctype="multipart/form-data">
                <label>Pilih NISN:</label>
                <select name="nisn" required>
                    <option value="">-- Pilih NISN --</option>
                    <?php while($row = $nisnList->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($row['nisn']) ?>">
                            <?= htmlspecialchars($row['nisn']) ?> - <?= htmlspecialchars($row['nama_lengkap']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label>Jenis Berkas:</label>
                <select name="jenis_berkas" required>
                    <option value="">-- Pilih --</option>
                    <option value="Kartu Keluarga">Kartu Keluarga</option>
                    <option value="Ijazah">Ijazah</option>
                    <option value="Raport">Raport</option>
                    <option value="Akte Kelahiran">Akte Kelahiran</option>
                </select>

                <label>Pilih File:</label>
                <input type="file" name="berkas" required>

                <button class="btn-upload" type="submit">Upload</button>
            </form>

            <div id="status"></div>

            <h3>Daftar Berkas Terupload</h3>
            <div id="tabelBerkas"></div>
        </div>
    </div>

    <script>
        document.getElementById("formUpload").addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("upload_berkas_action.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById("status").innerHTML = "<div style='color: green;'>✅ " + data + "</div>";
                this.reset();
                loadTabel();
            })
            .catch(() => {
                document.getElementById("status").innerHTML = "<div style='color: red;'>❌ Gagal upload.</div>";
            });
        });

        function loadTabel() {
            fetch("daftar_berkas_ajax.php")
                .then(res => res.text())
                .then(html => {
                    document.getElementById("tabelBerkas").innerHTML = html;
                });
        }

        window.onload = loadTabel;
    </script>
</body>
</html>

