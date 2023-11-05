<?php
session_start();
require '../koneksi.php';
require '../function.php';
isLogin("../login.php");

$userMail = $_SESSION['login'];
$userId = getUserId($conn, $userMail);
$following = getFollowing($conn, $userId);

$sql = "SELECT roommenfess.id, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN following INNER JOIN roommenfess ON following.idRoom = roommenfess.id AND menfess.idRoom = roommenfess.id WHERE following.idUser = '$userId' ";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {  
    $selectedValue = $_POST['chanel'];
    if($selectedValue != '*'){
        $sqlId = "SELECT roommenfess.id, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN following INNER JOIN roommenfess ON following.idRoom = roommenfess.id AND menfess.idRoom = roommenfess.id WHERE following.idUser = '$userId'  AND roommenfess.id = '$selectedValue'";
    }else{
        $sqlId = "SELECT roommenfess.id, roommenfess.nama, menfess.ke, menfess.dari, menfess.isi,menfess.likes FROM menfess INNER JOIN following INNER JOIN roommenfess ON following.idRoom = roommenfess.id AND menfess.idRoom = roommenfess.id WHERE following.idUser = '$userId'  ";
    }
    $result = mysqli_query($conn, $sqlId);
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

    <section id="body" class="body-menfess">
        <div class="container">
            <div class="mb-5">
                <label for="chanel">Select Chanel</label>
                <form action="" method="post" class="d-flex">
                    <select class="form-select bg-transparent bo-2 in-sheet" class='chanelSelect' aria-label="chanel" name="chanel">
                        <option name="chanel" class="t-black" value="*" >See all</option>
                        <?php foreach ($following as $follow) : ?>
                            <option name="chanel" value="<?php echo $follow['roomid'] ?>" class="t-black" <?php if(isset($_POST['chanel']) && $_POST['chanel'] == $follow['roomid']) echo 'selected'  ?>>
                                <?php echo $follow['nama'] . ' - ' . $follow['descript'] ?>
                            </option>
                        <?php endforeach ?>
    
                    </select>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>

            </div>
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
    </section>
    <?php include "../footer.php" ?>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>


</body>

</html>