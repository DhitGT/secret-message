<?php 
session_start();
require '../koneksi.php';
require '../function.php';
isLogin("../login.php");

$userMail = $_SESSION['login'];
$userId = getUserId($conn, $userMail);
$following = getFollowing($conn, $userId);
$idroom = $_GET['id'];

$sql = "SELECT roommenfess.id,roommenfess.idUser as idUserAdmin, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN roommenfess ON menfess.idRoom = roommenfess.id WHERE roommenfess.id = '$idroom' ";
$result = mysqli_query($conn, $sql);

$sqlRoom = "SELECT * FROM roommenfess WHERE id = '$idroom'";
$resultSqlRoom = mysqli_fetch_assoc(mysqli_query($conn,$sqlRoom));

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
</head>

<body>
    <?php include '../layout/headerMenfess.php' ?>

    <section id="room">
        <div class="container">
            <div class="room-head">
                <div class="room-head-left">
                    <img src="../media/img/<?php echo $resultSqlRoom['foto'] ?>" alt="">
                </div>
                <div class="room-head-right d-flex flex-column justify-content-evenly">
                    <div class="room-head-right-1">
                        <h1><?php echo $resultSqlRoom['nama'] ?></h1>
                        <span><?php echo $resultSqlRoom['descript'] ?></span>
                    </div>
                    <div class="room-head-right-2 d-flex gap-3">
                        <div class="fs-25">
                            <p>Follower : <?php echo convertToKFormat($resultSqlRoom['followers']) ?></p>
                        </div>
                        <div class="fs-25">
                            <p>Menfess : <?php echo convertToKFormat($resultSqlRoom['totalMenfess']) ?></p>
                        </div>
                    </div>
                    <div class="room-head-right-3">
                        <div class="rhr-3-item d-flex g-3">
                            <?php if($userId == mysqli_fetch_assoc($result)['idUserAdmin']): ?>
                                <a href="room.php?id=2" class="btn btn-secondary w-30 me-4">Admin</a>
                            <?php else: ?>
                                <a href="room.php?id=2" class="btn btn-secondary w-30 me-4">Unfollow</a>
                            <?php endif ?>
                            <a href="tambahFess.php" class="btn btn-primary w-50">Write Menfess</a>
                            <?php if($userId == mysqli_fetch_assoc($result)['idUserAdmin']): ?>
                                <a href="roomconfig.php?id=<?php echo $idroom ?>" class="btn btn-success w-30 ms-4">Configure Template</a>
                            <?php endif ?>
                        </div>
                        <div class="rhr-3-item">

                        </div>
                    </div>
                </div>
            </div>
            <div class="room-body mt-5">
                <div class="wrapper-menfess">
                    <?php foreach ($result as $res) : ?>
                        <div class="menfess-item">
                            <div class="menfess-chanel">
                                <p>Chanel : <a href="room.php?id=<?php echo $res['id'] ?>"><?php echo $res['nama'] ?></a></p>
                            </div>
                            <div class="menfess-bg">
                                <div class="menfess-head">
                                    <p>From : <span><?php echo $res['dari'] ?></span></p>
                                    <p>To : <a href=""><?php echo $res['ke'] ?></a></p>
                                </div>
                                <div class="menfess-body">
                                    <p><?php echo $res['isi'] ?></p>
                                </div>
                                <div class="menfess-bottom d-flex g-3 flex-column">
                                    <?php include '../layout/likes.php' ?>
                                    <p><?php echo convertToKFormat($res['likes']) ?> Likes</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <a href="explore.php" class="btn btn-primary w-100">Explore More Channel</a>
                </div>
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

    
</body>

</html>