<?php
session_start();
include "connect.php";
$email=$_SESSION["email"];
$total=0;
$done=false;
$point=0;
$reduce=0;
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
        <th>حذف</th>
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
            <td><?php echo $price=$row["price"]; ?></td>
            <td><?php echo $count=$row["count"]; ?></td>
            <td><a href="delete.php?id=<?php echo $row["id"]; ?>">حذف</a></td>
            <?php $total=$price*$count ?>
        </tr>
        <?php
    }
    ?>
</table>
<table align="center" cellpadding="10" dir="rtl">
    <tr>
        <td>
            <form action="pay.php" method="post">
در صورت داشتن کد تخفیف اینجا وارد کنید:<input type="text" name="code">
                <input type="submit" name="btncode" value="اعمال تخفیف">
            </form>
            <?php
            $sql="SELECT * FROM user WHERE email=:email";
            $result=$connect->prepare($sql);
            $result->bindParam(":email",$email);
            $result->execute();
            while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
                $point=$row["point"];
            }
            if($point>100 && $point<500){
                $reduce=$total*0.01;
            }elseif($point>500 && $point<1000){
                $reduce=$total*0.05;
            }elseif($point>1000 && $point<2000){
                $reduce=$total*0.06;
            }elseif($point>2000){
                $c1=$point-2000;
                $c2=floor($c1/1000);
                $re=6+$c2;
                if($re>8){
                    $reduce=$total*0.08;
                }else{
                    $reduce=$total*($re/100);
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>جمع کل:<?php echo number_format($total); ?></td>
        <?php
        if($reduce){
            ?>
            <td>قیمت با محاصبه تخفیف:<?php echo number_format($total=$total-$reduce); ?></td>
        <?php
        }
        ?>
    </tr>
    <tr>
        <td><a href="pay.php?total=<?php echo $total ?>">پرداخت</a></td>
    </tr>
</table>
</body>
</html>