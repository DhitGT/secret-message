<?php
include('koneksi.php');

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password','user')";
$cek_email = mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'");
$cek_login = mysqli_num_rows($cek_email);

if ($cek_login > 0) {
    session_start();
    $_SESSION['infoRegis'] = "Email sudah terdaftar gunakan email yang lain";
    header("location:register.php");   
    } else {
        if (mysqli_query($conn,$sql)) {
            echo "Registrasi sukses!";
            header("Location: login.php"); 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


mysqli_close($conn);
 
?>
