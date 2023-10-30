<?php 

    require_once '../koneksi.php';  
    $idUser = 1;
    $sql = "SELECT roommenfess.id, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN following INNER JOIN roommenfess ON menfess.idRoom = following.idRoom WHERE menfess.idUser = following.idUser AND roommenfess.id = menfess.idRoom AND menfess.idUser = '$idUser'";
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
</head>

<body>
    <?php include '../layout/headerMenfess.php' ?>

    <section id="body" class="body-menfess">
        <div class="container">
            <div class="card mb-5">
                <form method="post" class="d-flex ">
                    <input class="form-control" type="text" name="search" placeholder="Cari chanel menfess disini">
                    <button class="btn btn-outline-info ms-2">Cari</button>
                </form>
            </div>
            <div class="wrapper-menfess">
                <?php foreach($result as $res): ?>
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
                                <p><?php echo $res['likes'] ?> Likes</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                
                <a href="explore.php" class="btn btn-info w-100">Explore More Channel</a>
            </div>
        </div>
    </section>
    <?php include "../footer.php" ?>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

</html>