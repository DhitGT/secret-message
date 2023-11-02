<?php 
require 'koneksi.php';
function getFollowing($conn,$idUser){
    $sql = "SELECT * , roommenfess.id as roomid FROM roommenfess INNER JOIN following ON following.idRoom = roommenfess.id WHERE following.idUser = '$idUser'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return $result;
    }else{
        return;
    }
}

function isPageActive($currentPage, $pageToCheck) {
    return ($currentPage == $pageToCheck);
}

function isLogin($throw){
    if(isset($_SESSION['login'])){
        return;
    }else{
        header("location:$throw");
    }
}

function getUserId($conn,$email){

    $sql = "SELECT id FROM users WHERE email = '$email'";
    return mysqli_fetch_assoc(mysqli_query($conn,$sql))['id'];
}

function isFollowRoom($idRoom,$idUser,$conn){
    $sql = "SELECT * FROM `following` INNER JOIN roommenfess ON following.idRoom = roommenfess.id WHERE following.idRoom = '$idRoom' AND following.idUser = '$idUser'";
    return mysqli_num_rows(mysqli_query($conn,$sql));
}

function convertToKFormat($number) {
    if ($number < 1000) {
        return $number;
    } elseif ($number < 1000000) {
        return sprintf('%0.1fk', $number / 1000);
    } else {
        return sprintf('%0.1fM', $number / 1000000);
    }
}

?>