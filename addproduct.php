<?php
include "connect.php";

$name=$_POST["name"];
$desc=$_POST["description"];
$price=$_POST["price"];

$query="INSERT INTO product (name,description,price) VALUES (:name,:desc,:price)";
$result=$connect->prepare($query);
$result->bindParam(":name",$name);
$result->bindParam(":desc",$desc);
$result->bindParam(":price",$price);
$result->execute();
header("location:admin.php");

?>