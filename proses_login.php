<?php 
session_start();
include('koneksi.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
$iduser = mysqli_fetch_assoc($result)['id'];
$info = '';
$throwData = "&email=$email";

if (mysqli_num_rows($result) > 0) {
		header("Location: menfess/index.php");
      $_SESSION['login'] = $email;
      $_SESSION['loginid'] = $iduser;
} else{
	$info = "pasword atau email salah";
   header("location:login.php?infoemail=$info $throwData");
   }

mysqli_close($conn);
?>