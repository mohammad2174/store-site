<?php
include "connect.php";
$id=$_GET["id"];
$query="DELETE FROM basket WHERE id=:id";
$result=$connect->prepare($query);
$result->bindParam(":id",$id);
$result->execute();

header("location:showbasket.php");

?>