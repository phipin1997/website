<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION["login"] = true;
        $_SESSION["role"] = "admin";
        header("Location: index.php");
        exit();
    } elseif ($username == "user" && $password == "user123") {
        $_SESSION["login"] = true;
        $_SESSION["role"] = "user";
        header("Location: index.php");
        exit();
    } else {
        $error = "❌ Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - PSB SMK Mediateknologi</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background: linear-gradient(to right, #dbe9ff, #f0f6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 30px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            background: #0055aa;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #003f7f;
        }

        .error {
            background-color: #ffe0e0;
            color: #a00;
            padding: 10px;
            margin-bottom: 20px;
            border-left: 5px solid red;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            font-size: 0.85em;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>🔐 Login PSB SMK Mediateknologi</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Masukkan Username" required autofocus>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <input type="submit" value="Login">
        </form>
        <div class="footer">Gunakan akun <strong>admin</strong> atau <strong>user</strong> untuk login.<br>Password default: <em>admin123 / user123</em></div>
    </div>
</body>
</html>

