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
    <header>
        <nav class="nav-menfess">
            <div class="logo">
                <h3>Menfess</h3>

            </div>
            <ul>
                <li>
                    <form method="post" class="d-flex ">
                        <input class="form-control" type="text" name="search" placeholder="Cari chanel menfess disini">
                        <button class="btn btn-outline-info ms-2">Cari</button>
                    </form>
                </li>
                <li>
                    <a href="../menfess/index.php">Home</a>
                </li>
                <li>
                    <a href="explore.php">Explore</a>
                </li>
                <li>
                    <a href="following.php">Following</a>
                </li>
                <li>
                    <a href="../ngl/index.php">Ngl</a>
                </li>
                <li>
                    <a href="">Login</a>
                </li>
            </ul>
        </nav>
    </header>

    <section id="explore">
    <div class="container pt-5">
            <h1 align="center">Following</h1>
            <div class="wrapper-room">
                <div class="room-item gradient-card">
                    <div class="room-left">
                        <img src="https://placehold.co/400" alt="" >
                    </div>
                    <div class="room-right">
                        <b>
                            <h4>Rpl 3 Hits banget bang</h4>
                        </b>
                        <p>Followers : <span>234</span></p>
                        <p>Menfess : <span>109</span></p>
                        <div class="room-combine d-flex mt-2">
                            <a href="room.php?id=1" class="btn btn-danger w-100">Lihat</a>
                        </div>
                    </div>
                </div>
               
                
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

</html>