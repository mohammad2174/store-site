<?php
include "connect.php";

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"])) {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $price = $_POST["price"];

    $query = "INSERT INTO product (name,description,price) VALUES (:name,:desc,:price)";
    $result = $connect->prepare($query);
    $result->bindParam(":name", $name);
    $result->bindParam(":desc", $desc);
    $result->bindParam(":price", $price);
    $result->execute();
}
if(isset($_POST["code"]) && isset($_POST["percent"])){
    $code=$_POST["code"];
    $percent=$_POST["percent"];

    $query="INSERT INTO reduction (code,percent) VALUES (:code,:percent)";
    $result=$connect->prepare($query);
    $result->bindParam(":code",$code);
    $result->bindParam(":percent",$percent);
    $result->execute();
}
header("location:admin.php");

?>