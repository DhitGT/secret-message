<?php
require 'koneksi.php';


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
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
  
  <h1 align="center">Login</h1> 
  
    <form action="proses_login.php" method="POST">
    <table align="center">
        <tr>
            <td>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">email</label>
                <input type="text" name="email" id="email">
            </td>
        </tr>
        <tr>
            <td>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            </td>
        </tr>
           
        <tr>
            <td>
            <button type="submit"  name="submit">submit</button><br>
            </td>
        </tr>
            
            <tr>
                <td>
                <a href="register.php" type="button">Register</a>
                </td>
            </tr>
            
                
            
                
            
        </table>
    </form>

</body>
</html>

