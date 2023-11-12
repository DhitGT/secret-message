<?php 
session_start();
require '../koneksi.php';
require '../function.php';
isLogin("../login.php");

$userMail = $_SESSION['login'];
$userId = getUserId($conn, $userMail);
$following = getFollowing($conn, $userId);
$idroom = $_GET['id'];

$sql = "SELECT roommenfess.id as idRoom,menfess.id, roommenfess.idUser as idUserAdmin, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN roommenfess ON menfess.idRoom = roommenfess.id WHERE roommenfess.id = '$idroom' ";
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
    <link rel="stylesheet" href="../responsive.css">

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
                        <div class="rhr-3-item d-flex ">
                            <?php if($userId == mysqli_fetch_assoc($result)['idUserAdmin']): ?>
                                <a href="room.php?id=2" class="btn btn-secondary w-30 me-4">Admin</a>
                            <?php else: ?>
                                <a href="room.php?id=2" class="btn btn-secondary w-30 me-4">Unfollow</a>
                            <?php endif ?>
                            <a href="tambahFess.php" class="btn btn-primary w-20 me-4">Write Menfess</a>
                            <?php if($userId == mysqli_fetch_assoc($result)['idUserAdmin']): ?>
                                <a href="roomconfig.php?id=<?php echo $idroom ?>" class="btn me-4 btn-success w-20 ">Configure Template</a>
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
                <div class="menfess-item" >
                    <div class="menfess-chanel">
                        <p>Chanel : <a href="room.php?id=<?php echo $res['idRoom'] ?>">
                                <?php echo $res['nama'] ?>
                            </a></p>
                    </div>
                    <div class="menfess-bg">
                        <div class="menfess-content " id="menfess-<?php echo $res['id'] ?>"style=" <?php
                        $sqlStyle = "SELECT * FROM style WHERE idRoom = '$idroom'";
                        $result = mysqli_fetch_assoc(mysqli_query($conn,$sqlStyle));
                        echo $result['value'];
                        ?>">
                            <div class="menfess-paper">
                                <div class="menfess-head">
                                    <p>From : <span>
                                            <?php echo $res['dari'] ?>
                                        </span></p>
                                    <p>To : <a href="">
                                            <?php echo $res['ke'] ?>
                                        </a></p>
                                </div>
                                <div class="menfess-body">
                                    <p>
                                        <?php echo $res['isi'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="menfess-bottom d-flex g-3 flex-column">
                            <div class="d-flex mb-2 icon-group">
                                <div class="ico me-4">
                                    <img src="../media/icon/love.png" class="icon" alt="" srcset="">
                                </div>
                                <div class="ico me-auto">
                                    <img src="../media/icon/chat.png" class="icon" alt="">
                                </div>
                                <div class="ico">
                                    <img src="../media/icon/download.png" class="icon" alt=""onclick="DownloadImg('menfess-<?php echo $res['id'] ?>','<?php echo $res['nama'] ?>')">
                                </div>
                            </div>
                            <p>
                                <?php echo convertToKFormat($res['likes']) ?> Likes
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

    
</body>

</html>