<?php
session_start();
require 'koneksi.php';
if(isset($_SESSION['infoLogin'])){
    $info = $_SESSION['infoLogin'];
    echo "<script>alert('$info')</script>";
  }

if( isset($_POST["submit"]) ) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `users` (`id`, `nama`, `password`, `role`, `createdAt`) VALUES (NULL, '$nama', '$password', 'user', current_timestamp())";
    if(mysqli_query($conn,$sql)){
        header("<location:>
        <menfess>index.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="desain_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form method="post" action="proses_login.php">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" 
                required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me
            </label>
            
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a 
                href="proses_registrasi.php">Register</a></p>
            </div>
        </form>

    </div>
</body>
</html>

