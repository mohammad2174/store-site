<?php
include "connect.php";
$email=$_POST["username"];
$pass=$_POST["password"];
$user="";

$query="SELECT * FROM user WHERE email=:email and pass=:pass";
$result=$connect->prepare($query);
$result->bindParam(":email",$email);
$result->bindParam(":pass",$pass);
$result->execute();

while ($row=$result->fetch(PDO::FETCH_ASSOC)){
    $user=$row["email"];
}
if($user!="") {
    header("location:index.php?email=$user");
}else{
    header("location:index.php?error=5049");
}

?>