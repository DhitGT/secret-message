<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css" integrity="sha512-LeCmts7kEi09nKc+DwGJqDV+dNQi/W8/qb0oUSsBLzTYiBwxj0KBlAow2//jV7jwEHwSCPShRN2+IWwWcn1x7Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h3>MedFess</h3>

            </div>
            <ul>
                <li>
                    <a onclick="scrollToSection('bodys')">About</a>
                </li>
                <li>
                    <a href="menfess/index.php">Menfess</a>
                </li>
                
                <li>
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <section id="bodys">
            <div class="body-1">
                <p class="brand">MedFess</p>
                <div class="badge">
                    <div class="badge-item">ANONYMOUS</div>
                    <div class="badge-item">MESSAGE</div>
                    <div class="badge-item">PRIVACY</div>
                </div>
                <div class="quotes">
                    <p align="justify">
                        Silent Notes is a website where you can send messages to anyone anonymously. With this platform, you have the ability to communicate without revealing your identity, creating a secure and traceless space for conversation. It's the perfect place to share thoughts, feelings, and messages without the worry of identity disclosure.
                    </p>
                </div>
                <p class="info-txt">Explore More</p>
                <div class="destination">
                    <a onclick="scrollToSection('menfess')" class="desti-item"> MENFES </a>
                    <a onclick="scrollToSection('ngl')" class="desti-item">SECRET MAIL </a>
                </div>
            </div>
            <div class="body-2">

                <div class="bg-img"></div>
            </div>
        </section>

    </div>
    <section id="menfess">
        <div class="container">
            <div class="card card-menfess bo-0">
                <h2>Menfess Chanel</h2>
            </div>
            <div class="card card-menfess">
                <div class="menfess-left">
                    <div class="menfess-example">

                    </div>
                </div>
                <div class="menfess-right">
                    <div class="menfess-right-info">
                        <h2>Judul Chanel</h2>
                        <hr>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet expedita a modi ad ea obcaecati sunt nostrum adipisci assumenda quis voluptas debitis praesentium eum autem, quam quos corporis dicta, cupiditate veniam placeat explicabo deleniti odit, est laborum? Rem, labore vel. Animi error quibusdam tenetur omnis?</p>

                    </div>
                    <div class="action d-flex ">
                        <div class="action-item me-2">
                            <a href="menfess/index.php" class="btn btn-info ps-5 pe-5">Follow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="ngl">
        <div class="container">
            <div class="ngl-wrapper">

                <div class="ngl-bottom">
                    <h4 align="center">Trending Menfess</h4>
                    <p align="center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio adipisci veritatis, ex tempora esse iste sequi voluptatum numquam magnam in?</p>
                    <div class="ngl-theme">
                        <div class="menfess-example theme-item">
                            <div>
                                <div class="exam-head">
                                    <b>
                                        <p class="to"></p>
                                    </b>
                                    <hr>
                                </div>
                                <div class="exam-body">
                                    <span class="message">

                                    </span>
                                    <b>
                                        <p class="from"></p>
                                    </b>
                                    <hr>
                                </div>
                            </div>
                            <div class="exam-bottom flex-column">
                            <?php include 'layout/likes.php' ?>
                                <p>20k Likes</p>
                            </div>
                        </div>
                        <div class="menfess-example theme-item">
                            <div>
                                <div class="exam-head">
                                    <b>
                                        <p class="to"></p>
                                    </b>
                                    <hr>
                                </div>
                                <div class="exam-body">
                                    <span class="message">

                                    </span>
                                    <b>
                                        <p class="from"></p>
                                    </b>
                                    <hr>
                                </div>
                            </div>
                            <div class="exam-bottom flex-column">
                                <?php include 'layout/likes.php' ?>
                                <p>20k Likes</p>
                            </div>
                        </div>
                        <div class="menfess-example theme-item">
                            <div>
                                <div class="exam-head">
                                    <b>
                                        <p class="to"></p>
                                    </b>
                                    <hr>
                                </div>
                                <div class="exam-body">
                                    <span class="message">

                                    </span>
                                    <b>
                                        <p class="from"></p>
                                    </b>
                                    <hr>
                                </div>
                            </div>
                            <div class="exam-bottom flex-column">
                            <?php include 'layout/likes.php' ?>
                                <p>20k Likes</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // JavaScript function to scroll to a section with an offset
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);

            if (section) {
                // Calculate the offset (adjust as needed)
                const offset = 100;

                // Scroll to the section with the offset
                window.scrollTo({
                    top: section.offsetTop - offset,
                    behavior: "smooth",
                });
            }
        }
    </script>


</body>

</html>