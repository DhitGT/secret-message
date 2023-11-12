<?php
session_start();
require '../koneksi.php';
require '../function.php';
isLogin("../login.php");

$userMail = $_SESSION['login'];
$userId = getUserId($conn, $userMail);
$following = getFollowing($conn, $userId);
$idRoom = $_GET['id'];
$sqlCheckAdmin = "SELECT * FROM roommenfess WHERE id = '$idRoom'";
$roomData = mysqli_fetch_assoc(mysqli_query($conn,$sqlCheckAdmin));
if($roomData['idUser'] != $userId){
    header('location:index.php');
}   

$sqlCheckStyleRoom = "SELECT * FROM style WHERE idRoom = '$idRoom'";
$resultStyle = mysqli_fetch_assoc(mysqli_query($conn,$sqlCheckStyleRoom));
$isHaveStyle = mysqli_num_rows(mysqli_query($conn,$sqlCheckStyleRoom));

if (isset($_POST['submit'])) {
    $value = $_POST['css-value'];
    $gambar = $_FILES["bg-img"]["name"];
    $targetDir = "../media/img/";
    $targetFile = $targetDir . basename($_FILES["bg-img"]["name"]);
    if($isHaveStyle){
        $sql = "UPDATE `style` SET `value` = '$value' WHERE `style`.`idRoom` =$idRoom ";
    }else{
        $sql = "INSERT INTO `style` (`id`, `idRoom`, `value`) VALUES (NULL, '$idRoom', '$value')";
    }

    if (move_uploaded_file($_FILES["bg-img"]["tmp_name"], $targetFile)) {

        if (mysqli_query($conn, $sql)) {
            header("location:index.php");
        }
    }

    
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Config</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include '../layout/headerMenfess.php' ?>

    <section id="addFess" class="pt-10">
        <div class="container d-flex">
            <div class="card card-dark preview-config ">
                <div class="pt-5">
                    <h5 align="center">Preview</h5>
                    <div class="menfess-bg">
                        <div class="menfess-content" id="menfess-preview-content"
                            <?php if($isHaveStyle): ?>
                                style="<?php echo $resultStyle['value'] ?>"
                            <?php else: ?>
                                style=" text-align:center; background-image:url('../media/img/bgstick.jpeg');color:black;font-size:15px;"
                            <?php endif ?>
                            >
                            <div class="menfess-paper">
                                <div class="menfess-head">
                                    <p>From : <span>
                                            Lorem ipsum dolor sit.
                                        </span></p>
                                    <p>To : <a href="">
                                            Lorem ipsum dolor sit amet.
                                        </a></p>
                                </div>
                                <div class="menfess-body">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus reprehenderit
                                        cumque, quaerat odit adipisci, hic inventore numquam quis repellat vel autem
                                        consectetur eaque architecto neque soluta? Mollitia, ad totam! Quam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="menfess-bottom d-flex g-3 flex-column">
                            <div class="d-flex mb-2 icon-group">
                                <div class="ico me-4">
                                    <img src="../media/icon/love.png" class="icon" alt="" srcset="">
                                </div>
                                <div class="ico me-auto">
                                    <img src="../media/icon/chat.png" class="icon" alt="">
                                </div>
                                <div class="ico">
                                    <img src="../media/icon/download.png" class="icon" alt="">
                                </div>
                            </div>
                            <p>
                                <?php echo 0 ?> Likes
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-dark p-5">
                <h4 align="center">Config Menfess</h4>
                <form action="" class="mt-2" method="post" class="form" enctype="multipart/form-data">

                    <div class="sheet input-config">


                        <div class="font-size">
                            <label for="font-size">Font Size :</label>
                            <div class="d-flex">
                                <input style="width:90%;" class="w-70" id="fontsize-input" type="number" class="form-control"
                                    name="font-size" value="15" onchange="fontSizeHandler(this.value)">
                                <span style="width:4em; font-size:14px;"
                                    class="ms-5 num-range-fontSize bg-transparent">15px<span>
                            </div>
                            <hr>
                        </div>
                        <label for="alignFont">Font Align</label>
                        <div class="font-align d-flex justify-content-evenly mt-4">
                            <div class="font-align-item" name="alignFont">
                                <input type="button" onclick="fontAlignHandler('left')" value="L">
                            </div>
                            <div class="font-align-item" name="alignFont">
                                <input type="button" onclick="fontAlignHandler('center')" value="C">
                            </div>
                            <div class="font-align-item" name="alignFont">
                                <input type="button" onclick="fontAlignHandler('right')" value="R">
                            </div>
                            <div class="font-align-item" name="alignFont">
                                <input type="button" onclick="fontAlignHandler('justify')" value="J">
                            </div>
                        </div>
                        <hr>

                        <div class="font">
                            <label for="font">Font :</label>
                            <select name="font" id="font-input" class="form-control bg-transparent bo-0 in-sheet"
                                onchange="fontHandler(this.value,this)">
                                <option value="GrundschriftRegular" class="form-control fnt-grund" name="font" selected>Grunds
                                    Chrift</option>
                                <option value="\'Comic Neue\', cursive" class="form-control fnt-comic-neue" name="font">
                                    Comic</option>
                                <option value="PoppinsRegular" class="form-control fnt-poppins" name="font">Poppins
                                </option>
                            </select>
                            <hr>
                        </div>
                        <div class="font-color">
                            <label for="bg-img">Font Color :</label>
                            <input type="color" id="fontcolor-input" class="form-control" name="font-color"
                                onchange="fontColorHandler(this.value)">
                            <hr>
                        </div>
                        <div class="bg-image">
                            <label for="bg-img">Background Image :</label>
                            <input type="file" class="form-control bg-img-input" name="bg-img" onchange="bgImgHandler(event)">
                            <hr>
                        </div>
                        <div class="bgColor">
                            <label for="bg-color">Background Color :</label>
                            <input type="color" id="bg-color" class="form-control" name="bg-color"
                                onchange="bgColorHandler()">
                            <hr>
                        </div>
                        <div class="bgAlpha">
                            <label for="bg-alpha">Background Alpha : <span id="value-alpha">0.1</span></label>
                            <input value="0.1" min="0" max="1" step="0.1" type="range" id="alpha-input" class="form-control" name="bg-alpha"
                                onchange="bgColorHandler()">
                            <hr>
                        </div>
                        <div class="bgBlend">
                            <label for="bg-blend">Background Blend Mode :</label>
                            <select name="bg-blend" class="form-control"  id="bg-blend" onchange="bgBlendMode(this.value)">
                                <option value="normal" selected>Normal</option>
                                <option value="multiply">Multiply</option>
                                <option value="screen">Screen</option>
                                <option value="overlay">Overlay</option>
                                <option value="darken">Darken</option>
                                <option value="lighten">Lighten</option>
                                <option value="color-dodge">Color Dodge</option>
                                <option value="color-burn">Color Burn</option>
                                <option value="hard-light">Hard Light</option>
                                <option value="soft-light" >Soft Light</option>
                                <option value="difference">Difference</option>
                                <option value="exclusion">Exclusion</option>
                                <option value="hue">Hue</option>
                                <option value="saturation">Saturation</option>
                                <option value="color">Color</option>
                                <option value="luminosity">Luminosity</option>
                            </select>

                            <hr>
                        </div>
                        <input type="hidden" id="css-value" name="css-value">

                    </div>
                    <button class="btn btn-outline-info w-100 mt-3" onclick="generateCSS()" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <script src="../roomconfig.js"></script>
    <?php include '../footer.php' ?>
</body>

</html>