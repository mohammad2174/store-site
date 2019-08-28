<?php
include "connect.php";
session_start();
$email=$_POST["username"];
$pass=$_POST["password"];
$user="";
$type="";

$query="SELECT * FROM user WHERE email=:email and pass=:pass";
$result=$connect->prepare($query);
$result->bindParam(":email",$email);
$result->bindParam(":pass",$pass);
$result->execute();

while ($row=$result->fetch(PDO::FETCH_ASSOC)){
    $user=$row["email"];
    $type=$row["type"];
}
if($user!="" && $type=="user") {
    $_SESSION["email"]=$user;
    header("location:index.php");
}elseif($user!="" && $type=="admin"){
    header("location:admin.php");
}else{
    header("location:index.php?error=5049");
}

?>