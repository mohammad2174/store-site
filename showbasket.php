<?php
session_start();
include "connect.php";
$email=$_SESSION["email"];
$done=false;
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table align="center" border="1" dir="rtl">
    <tr>
        <th>ردیف</th>
        <th>نام محصول</th>
        <th>خریدار</th>
        <th>قیمت</th>
        <th>تعداد</th>
        <th>تخفیف</th>
    </tr>
    <?php
    $sqlread="SELECT * FROM basket WHERE email=:email and done=:done";
    $result=$connect->prepare($sqlread);
    $result->bindParam(":email",$email);
    $result->bindParam(":done",$done);
    $result->execute();
    while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo $row["count"]; ?></td>
            <td><?php echo $row["reduction"]; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>