<?php
include "connect.php";
if(isset($_POST["btnreg"])){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $address=$_POST["address"];
    $tel=$_POST["tel"];
    $type="user";
    $point=0;

    $query="INSERT INTO user (email,pass,address,phone,type,point) VALUES (:user,:pass,:address,:tel,:type,:point)";
    $result=$connect->prepare($query);
    $result->bindParam(':user',$user);
    $result->bindParam(':pass',$pass);
    $result->bindParam(':address',$address);
    $result->bindParam(':tel',$tel);
    $result->bindParam(':type',$type);
    $result->execute();
    header("location:index.php?email=$user");
}

?>