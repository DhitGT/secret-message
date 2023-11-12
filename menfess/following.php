<?php 
session_start();
    require_once '../koneksi.php';
    require "../function.php";
    isLogin("../login.php");

    $userMail = $_SESSION['login'];
    $userId = getUserId($conn,$userMail);
    $sql = "SELECT * FROM roommenfess INNER JOIN following ON following.idRoom = roommenfess.id WHERE following.idUser = '$userId'";
    $result = mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menfess</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../responsive.css">

</head>

<body>
<?php include '../layout/headerMenfess.php' ?>

    <section id="explore">
    <div class="container pt-5">
            <h1 align="center">Following</h1>
            <div class="wrapper-room">
                <?php foreach($result as $res): ?>
                    <div class="room-item gradient-card">
                        <div class="room-left">
                            <img src="../media/img/<?php echo $res['foto'] ?>" alt="<?php echo $res['foto'] ?>" >
                        </div>
                        <div class="room-right">
                            <div>
                                <b>
                                    <h4><?php echo $res['nama'] ?></h4>
                                </b>
                                <p style="margin-top:-4% ;" class="desc"><?php echo $res['descript'] ?></p>
                                <p>Followers : <span><?php echo $res['followers'] ?></span></p>
                            </div>
                            <div class="room-combine d-flex mt-2">
                            <a href="room.php?id=<?php echo $res['idRoom'] ?>" class="btn btn-success w-100">Lihat</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

</body>

</html>