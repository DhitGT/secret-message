<?php

require '../koneksi.php';
require '../function.php';
$following = getFollowing($conn, 1);
$idUser = 1;

if(isset($_POST['submit'])){
    $chanel = $_POST['chanel'];
    $to = $_POST['to'];
    $message = $_POST['message'];
    $from = $_POST['from'];

    $sql = "INSERT INTO `menfess` (`id`, `idUser`, `idRoom`, `dari`, `ke`, `isi`, `likes`, `tanggal`) VALUES ('', '$idUser', '$chanel', '$from', '$$to', '$message', '0', current_timestamp())";
    if(mysqli_query($conn,$sql)){
        header("location:index.php");
    }
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

    <section id="addFess">
        <div class="container">
            <div class="card card-dark p-5">
                <h4 align="center">Menfess Seseorang</h4>
                <form action="" class="mt-2" method="post" class="form" >

                    <div class="sheet">
                        <label for="chanel">Select Chanel</label>
                        <br>
                        <div class="chanel">
                            <select class="form-select bg-transparent bo-2 in-sheet" aria-label="chanel" name="chanel" required >
                                <?php foreach($following as $follow): ?>
                                <option name="chanel" value="<?php echo $follow['roomid'] ?>" class="t-black">
                                    <div class="d-flex">
                                        <?php echo $follow['nama'] ?>
                                        <span> - </span>
                                        <?php echo $follow['descript'] ?>
                                    </div>    
                                </option>
                                <?php endforeach ?>

                            </select>
                            <br>
                            <hr>

                        </div>
                        <div class="to">
                            <label for="to">To :</label>
                            <input name="to" class="form-control bg-transparent bo-0 in-sheet" type="text" placeholder="@Someone" required>
                            <hr>
                        </div>
                        <div class="message">
                            <textarea name="message" id="" cols="30" rows="1" class="form-control bg-transparent bo-0 in-sheet" required>Some Message in here
                            </textarea>


                            <hr>
                        </div>
                        <div class="from">
                            <label for="from">From :</label>
                            <input name="from" class="form-control bg-transparent bo-0 in-sheet" type="text" placeholder="@Someone" required>

                            <hr>
                        </div>
                        <button class="btn btn-outline-info w-30" type="submit" name="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

</html>