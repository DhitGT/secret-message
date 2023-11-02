<?php 
session_start();
require '../koneksi.php';
require '../function.php';
isLogin('../login.php');

$userMail = $_SESSION['login'];
$userId = getUserId($conn,$userMail);
$idChanel = $_GET['id'];

$sql = "INSERT INTO `following` (`id`, `idRoom`, `idUser`, `joinAt`) VALUES ('', '$idChanel', '$userId', '')";
if(mysqli_query($conn,$sql)){
    header("location:explore.php#$idChanel");
}

mysqli_close($conn);

?>