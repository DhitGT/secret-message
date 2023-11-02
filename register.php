<?php
include('koneksi.php');
session_start();

$infoEmail = isset($_GET['infomail']) ? $_GET['infomail'] : '.';
$infoPw = isset($_GET['infopw']) ? $_GET['infopw'] : '.';
$infoPw2 = isset($_GET['infopw2']) ? $_GET['infopw2'] : '.';

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


        <form method="post" action="proses_registrasi.php" onsubmit="preventDefaultAction(event)">
            <h1>Registrasi</h1>
            <div class="input-box">
                <label for="nama" class="info">.</label>
                <input type="text" name="nama" placeholder="Nama" required value="<?php echo isset($_GET['nama']) ? $_GET['nama'] : ''  ?>">
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <label for="email" class="info"><?php echo $infoEmail ?></label>
                <input type="email" name="email" placeholder="Email" required value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''  ?>">
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <label for="password" class="info"><?php echo $infoPw ?></label>
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <label for="password2" class="info"><?php echo $infoPw2 ?></label>
                <input type="password" name="password2" placeholder="Ulangi Password" required>
                <i class='bx bxs-user'></i>
            </div>
            <br>
            <button type="submit" value="Daftar" class="btn">Register</button>


    </div>
</body>

</html>