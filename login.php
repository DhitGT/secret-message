<?php
session_start();
require 'koneksi.php';
$infomail = isset($_GET['infoemail']) ? $_GET['infoemail'] : ' ';
$infoPw = isset($_GET['infopw']) ? $_GET['infopw'] : ' ';


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
                <input type="email" name="email" placeholder="Email" 
                required value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''  ?>">
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
            <label for="email" class="info"><?php echo $infomail ?></label>
            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a 
                href="register.php">Register</a></p>
            </div>
        </form>

    </div>
</body>
</html>

