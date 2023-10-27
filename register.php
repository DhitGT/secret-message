<?php
include ('koneksi.php');
session_start();
if(isset($_SESSION['infoRegis'])){
  $info = $_SESSION['infoRegis'];
  echo "<script>alert('$info')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Register Berita</title>
</head>
<body>
    <div class="register">

    <h1 align="center">Registrasi</h1>
    <form method="post" action="proses_registrasi.php">
    <table align="center">
    <tr>
        <td>
        <td>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required><br>
        </td>
        </td>
    </tr>

    <tr>
        <td>
        <td>
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>
        </td>
        </td>
    </tr>

    <tr>
        <td>
        <td>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        </td>
        </td>
    </tr>

    <tr>
        <td>
        <td>
        <label for="ulangi_password">Ulangi Password:</label>
        <input type="password" name="ulangi_password" required><br>
        </td>
        </td>
    </tr>

    <tr>
        <td>
        <td>
        <input type="submit" value="Daftar">
        </td>
        </td>
    </tr>
    </table>
    </form>

    </div>
</body>
</html>