<?php 

function getFollowing($conn,$idUser){
    $sql = "SELECT * , roommenfess.id as roomid FROM roommenfess INNER JOIN following ON following.idRoom = roommenfess.id WHERE following.idUser = '$idUser'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return $result;
    }else{
        return;
    }
}




?>