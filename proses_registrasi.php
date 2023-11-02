<?php
session_start();
include('koneksi.php');
require 'function.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$sql = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password','user')";
$cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email'");
$cek_login = mysqli_num_rows($cek_email);
$info = '';
$throwData = "&nama=$nama&email=$email";


if ($cek_login > 0) {
    $info = "Email sudah terdaftar";
    header("location:register.php?infomail=$info $throwData");
    exit();
} else {
    if (strlen($password) >= 8) {
        if ($password == $password2) {
            if (mysqli_query($conn, $sql)) {
                echo "Registrasi sukses!";
                header("Location: login.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            $info = "Password tidak sama";
            header("location:register.php?infopw2=$info $throwData");
            exit();
        }
    } else {
        $info = "Password kurang dari 8 huruf";
        header("location:register.php?infopw=$info $throwData");
        exit();
    }
}


mysqli_close($conn);
