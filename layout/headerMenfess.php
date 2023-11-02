<?php

session_start();
$islogin = $_SESSION['login'];
$userId = $_SESSION['loginid'];
?>


<header>
    <nav class="nav-menfess">
        <div class="logo">
            <img src="../media/icon/logo.jpg"  alt="">

        </div>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="explore.php">Explore</a>
            </li>
            <li>
                <a href="following.php">Following</a>
            </li>
            <li>
                <div class="dropdown transparent  color-sec">
                    <button class="btn btn-dark dropdown-toggle p-0 dropdown-item-header color-sec bg-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tambah
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item p-2" href="tambahChanel.php">Buat Chanel Menfess</a></li>
                        <li><a class="dropdown-item p-2" href="tambahFess.php">Tambah Menfess</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="dropdown transparent  color-sec">
                    <?php if (!$islogin) : ?>
                        <a href="following.php">Following</a>
                    <?php else : ?>
                        <div class="dropdown transparent  color-sec">
                            <button class="btn btn-dark dropdown-toggle dropdown-item-header p-0 color-sec bg-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $islogin ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item p-2" href="../profile.php?id=<?php echo $userId ?>">Profile</a></li>
                                <li><a class="dropdown-item p-2" href="../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </li>   
        </ul>
    </nav>
</header>