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
    <link rel="stylesheet" href="desain_login.css">
    <title>Register Berita</title>
</head>
<body>
    <div class="wrapper">

        
        <form method="post" action="proses_registrasi.php">
            <h1 >Registrasi</h1>
            <div class="input-box">
                <input type="text" name="nama" placeholder="Nama" 
                required>
                <i class='bx bxs-user'></i>
            </div>
            
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" 
                required>
                <i class='bx bxs-user'></i>
            </div>
        
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" 
                required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Ulangi Password" 
                required>
                <i class='bx bxs-user'></i>
            </div>

            <button type="submit" value="Daftar" class="btn">Register</button>
            
    
    </div>
</body>
</html>