<?php 

    $username = 'root';
    $password = '';
    $server = 'localhost';
    $dbName = 'db_secret_message';
    $conn   = mysqli_connect ($server,$username, $password, $dbName); 
    if (!$conn) {
        die("KONEKSI ERROR" . mysqli_connect_error());
    }

?>