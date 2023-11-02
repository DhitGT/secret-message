<?php
session_start();
require '../koneksi.php';
require '../function.php';
isLogin("../login.php");

$userMail = $_SESSION['login'];
$userId = getUserId($conn, $userMail);
$sql = "SELECT * FROM roommenfess";
$result = mysqli_query($conn, $sql);

if(isset($_POST['search'])){
    $searchBar = $_POST['searchIn'];
    $sql = "SELECT * FROM roommenfess WHERE nama LIKE '%$searchBar%'";
    $result = mysqli_query($conn, $sql);
}

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

    <section id="explore">
        <div class="container pt-5">
            <h1 align="center">Explore</h1>
            <div class="card mb-5 m-auto w-50 searchbar">
                <form method="post" class="d-flex bg-dark ">
                    <input class="form-control" type="text" name="searchIn" placeholder="Cari chanel menfess disini" value="<?php echo isset($_POST['searchIn'])? $_POST['searchIn'] : '' ?>">
                    <button class="btn btn-outline-info ms-2" name="search">Cari</button>
                </form>
            </div>
            <div class="wrapper-room">
                <?php foreach ($result as $res) : ?>
                    <div class="room-item gradient-card" id="<?php echo $res['id'] ?>">
                        <div class="room-left">
                            <img src="../media/img/<?php echo $res['foto'] ?>" alt="<?php echo $res['foto'] ?>">
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
                                <?php if (!isFollowRoom($res['id'], $userId, $conn)) : ?>
                                    <a href="followHandle.php?id=<?php echo $res['id'] ?>" class="btn btn-danger w-100">Follow</a>
                                <?php else : ?>
                                    <a href="" class="btn btn-secondary w-50">Followed</a>
                                    <a href="room.php?id=<?php echo $res['id'] ?>" class="btn btn-success w-50">Lihat</a>

                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

<?php mysqli_close($conn); ?>

</html>