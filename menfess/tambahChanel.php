<?php 
    require_once '../koneksi.php';
    $idUser = 1 ;
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $desc = $_POST['desc'];
        $gambar = $_FILES["gambar"]["name"];
        $targetDir = "../media/img/";
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO `roommenfess` (`id`, `idUser`,`nama`, `followers`, `totalMenfess`, `descript`, `foto`) VALUES ('', '$idUser','$nama' ,'0', '0', '$desc', '$gambar')";
            if(mysqli_query($conn,$sql)){
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
    <title>Menfess</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<?php include '../layout/headerMenfess.php' ?>

    <section id="addChanel" class="mt-5">
        <div class="container">
            <div class="card card-dark p-5">
                <h4 align="center" >Buat Chanel Menfess</h4>
                <form action="" class="mt-2" method="post" class="form" enctype="multipart/form-data">
                    <table class="m-auto ">
                        <tr>
                            <th width="25%"></th>
                            <th width="10%"></th>
                            <th width="70%"></th>
                        </tr>
                        <tr>
                            <td>
                                <p class="form-label">Nama Chanel</p>
                            </td>
                            <td>
                                <p class="form-label">:</p>
                            </td>
                            <td>
                                <input type="text" name="nama" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="form-label">Deskripsi</p>
                            </td>
                            <td>
                                <p class="form-label">:</p>
                            </td>
                            <td>
                                <input type="text" name="desc" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="form-label">Foto Profil</p>
                            </td>
                            <td>
                                <p class="form-label">:</p>
                            </td>
                            <td>
                                <input type="file" name="gambar" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submit" class="btn btn-outline-secondary w-100">Submit</button>

                            </td>
                            <td></td>
                            <td>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
        </div>
    </section>
    <?php include '../footer.php' ?>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
</body>

</html>