<?php 
session_start();
require '../koneksi.php';
require '../function.php';
isLogin("../login.php");

$userMail = $_SESSION['login'];
$userId = getUserId($conn, $userMail);
$following = getFollowing($conn, $userId);
$idroom = $_GET['id'];

$sql = "SELECT roommenfess.id, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN following INNER JOIN roommenfess ON following.idRoom = roommenfess.id AND menfess.idRoom = roommenfess.id WHERE roommenfess.id = '$idroom' ";
$result = mysqli_query($conn, $sql);



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
                    <img src="../media/img/ridwan_kamil.jpg" alt="">
                </div>
                <div class="room-head-right d-flex flex-column justify-content-evenly">
                    <div class="room-head-right-1">
                        <h1>Butun Fess</h1>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem provident officiis nam facere eveniet et similique eum, harum reiciendis vitae autem quia quisquam, voluptate at explicabo itaque. Ad fugiat quam incidunt eum porro beatae!</span>
                    </div>
                    <div class="room-head-right-2 d-flex gap-3">
                        <div class="fs-25">
                            <p>Follower : 12k</p>
                        </div>
                        <div class="fs-25">
                            <p>Menfess : 150</p>
                        </div>
                    </div>
                    <div class="room-head-right-3">
                        <div class="rhr-3-item d-flex">
                            <a href="room.php?id=2" class="btn btn-secondary w-50">Unfollow</a>
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

                    <a href="explore.php" class="btn btn-info w-100">Explore More Channel</a>
                </div>
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

</html>