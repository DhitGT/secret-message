<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$islogin = $_SESSION['login'];
$userId = $_SESSION['loginid'];
require '../fontlib.html';
?>



<header style="position:fixed; top:0;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" >
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="../media/icon/logo.jpg" alt="" width="100px" style="mix-blend-mode:screen;"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="explore.php" class="nav-link">Explore</a>
        </li>
        <li class="nav-item">
          <a href="following.php" class="nav-link">Following</a>
        </li>
        <li class="nav-item">
          <div class="dropdown transparent color-sec nav-link">
            <button
              class="btn btn-dark dropdown-toggle p-0 dropdown-item-header color-sec bg-2"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Tambah
            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item p-2" href="tambahChanel.php"
                  >Buat Chanel Menfess</a
                >
              </li>
              <li>
                <a class="dropdown-item p-2" href="tambahFess.php"
                  >Tambah Menfess</a
                >
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
              <div class="dropdown transparent color-sec nav-link">
            <?php if (!$islogin) : ?>
            <a href="following.php">Following</a>
            <?php else : ?>
            <div class="dropdown transparent color-sec">
              <button
                class="btn btn-dark dropdown-toggle dropdown-item-header p-0 color-sec bg-2"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <?php echo $islogin ?>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <a
                    class="dropdown-item p-2"
                    href="../profile.php?id=<?php echo $userId ?>"
                    >Profile</a
                  >
                </li>
                <li>
                  <a class="dropdown-item p-2" href="../logout.php">Logout</a>
                </li>
              </ul>
            </div>
            <?php endif ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>