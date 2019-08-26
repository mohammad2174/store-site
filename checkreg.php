<?php
include "connect.php";
if(isset($_POST["btnreg"])){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $address=$_POST["address"];
    $tel=$_POST["tel"];

    $query="INSERT INTO user (email,pass,address,phone) VALUES (:user,:pass,:address,:tel)";
    $result=$connect->prepare($query);
    $result->bindParam(':user',$user);
    $result->bindParam(':pass',$pass);
    $result->bindParam(':address',$address);
    $result->bindParam(':tel',$tel);
    $result->execute();
    header("location:index.php");
}

?>