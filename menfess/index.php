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
                <h3>MedFess</h3>

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
                    <a href="../login.php">Login</a>
                </li>
            </ul>
        </nav>
    </header>

    <section id="body" class="body-menfess">
        <div class="container">
            <div class="wrapper-menfess">
                <div class="menfess-item">
                    <div class="menfess-chanel">
                        <p>Chanel : <a href="room.php?id=1">Butun Fess</a></p>
                    </div>
                    <div class="menfess-bg">
                        <div class="menfess-head">
                            <p>From : <span>No One</span></p>
                            <p>To : <a href="">@d.dheepy</a></p>
                        </div>
                        <div class="menfess-body">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat dignissimos fuga non vero perferendis corrupti dolorum odit unde? Modi ut beatae vitae officia et dolorem, cum dignissimos, facere, aperiam aliquam id mollitia necessitatibus voluptatum!</p>
                        </div>
                        <div class="menfess-bottom d-flex g-3">
                            <p class="me-3">like</p>
                            <p>comment</p>
                        </div>
                    </div>
                </div>
                <div class="menfess-item">
                    <div class="menfess-chanel">
                        <p>Chanel : <a href="">Butun Fess</a></p>
                    </div>
                    <div class="menfess-bg">
                        <div class="menfess-head">
                            <p>From : <span>No One</span></p>
                            <p>To : <a href="">@d.dheepy</a></p>
                        </div>
                        <div class="menfess-body">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat dignissimos fuga non vero perferendis corrupti dolorum odit unde? Modi ut beatae vitae officia et dolorem, cum dignissimos, facere, aperiam aliquam id mollitia necessitatibus voluptatum!</p>
                        </div>
                        <div class="menfess-bottom d-flex g-3">
                            <p class="me-3">like</p>
                            <p>comment</p>
                        </div>
                    </div>
                </div>
                <div class="menfess-item">
                    <div class="menfess-chanel">
                        <p>Chanel : <a href="">Rpl 3 Fess</a></p>
                    </div>
                    <div class="menfess-bg">
                        <div class="menfess-head">
                            <p>From : <span>No One</span></p>
                            <p>To : <a href="">@d.dheepy</a></p>
                        </div>
                        <div class="menfess-body">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat dignissimos fuga non vero perferendis corrupti dolorum odit unde? Modi ut beatae vitae officia et dolorem, cum dignissimos, facere, aperiam aliquam id mollitia necessitatibus voluptatum!</p>
                        </div>
                        <div class="menfess-bottom d-flex g-3">
                            <p class="me-3">like</p>
                            <p>comment</p>
                        </div>
                    </div>
                </div>
                <a href="explore.php" class="btn btn-info w-100" >Explore More Channel</a>
            </div>
        </div>
    </section>
    <?php include "../footer.php" ?>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

</html>