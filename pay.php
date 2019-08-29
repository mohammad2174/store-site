<?php
session_start();
include "connect.php";
$email=$_SESSION["email"];
$total=$_GET["total"];
$point=0;
$done=true;

$query="SELECT * FROM user WHERE email=:email";
$result=$connect->prepare($query);
$result->bindParam(":email",$email);
$result->execute();
while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
    $point=$row["point"];
}
$c=ceil($total/100000);
    $point=$point+$c;
    $sql="UPDATE user SET point=:point WHERE email=:email";
    $result=$connect->prepare($sql);
    $result->bindParam(":email",$email);
    $result->bindParam(":point",$point);
    $result->execute();

    $sqlb="UPDATE basket SET done=:done WHERE email=:email";
    $result=$connect->prepare($sqlb);
    $result->bindParam(":email",$email);
    $result->bindParam(":done",$done);
    $result->execute();

    header("location:index.php");

?>