<?php 
include('koneksi.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
		header("Location: index.php");
} else {
		echo "password atau email anda salah!";
} 

mysqli_close($conn);
?>