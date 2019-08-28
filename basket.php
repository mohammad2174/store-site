<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
session_start();
include "connect.php";
$name="";
$price=0;
$email=$_SESSION["email"];
$count=0;
$done=false;

$id=$_GET["id"];
$query="SELECT * FROM product WHERE id=:id";
$result=$connect->prepare($query);
$result->bindParam(":id",$id);
$result->execute();
while ($row=$result->fetch(PDO::FETCH_ASSOC)){
    $name=$row["name"];
    $price=$row["price"];
}
$sql="SELECT * FROM basket WHERE email=:email and name=:name and done=:done";
$result=$connect->prepare($sql);
$result->bindParam(":email",$email);
$result->bindParam(":name",$name);
$result->bindParam(":done",$done);
$result->execute();

while ($row=$result->fetch(PDO::FETCH_ASSOC)){
    if($row["count"]) {
        $count = $row["count"];
    }else{
        $count=0;
    }
}
if($count>0){
    $updatequery="UPDATE basket SET count=:count WHERE name=:name";
    $result=$connect->prepare($updatequery);
    $count++;
    $result->bindParam(":name",$name);
    $result->bindParam(":count",$count);
    $result->execute();
}else{
    $counts=1;
    $reduction=0;
    $insertquery="INSERT INTO basket (name,email,price,count,reduction) VALUES (:name,:email,:price,:count,:reduction)";
    $result=$connect->prepare($insertquery);
    $result->bindParam(":name",$name);
    $result->bindParam(":email",$email);
    $result->bindParam(":price",$price);
    $result->bindParam(":count",$counts);
    $result->bindParam(":reduction",$reduction);
    $result->execute();
}
header("location:index.php");
?>

</body>
</html>


