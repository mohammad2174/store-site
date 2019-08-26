<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>عضویت</title>
    <link media="screen" href="style.css"  type="text/css" rel="stylesheet" >
    <link media="screen" href="main.css"  type="text/css" rel="stylesheet" ><script src="js/najva.js" type="text/javascript"></script>
</head>

<body>
<div class="menu">
    <div class="menu_top"><h3 class="user">ورود کاربر</h3></div>
    <div class="menu_body"><div class="text">
            <form method="post" action="checklogin.php">
                <p class="input"><input name="username" type="text" size="25" placeholder="ایمیل..."/></p>
                <p class="input"><input name="password" type="password" size="25" placeholder="رمز عبور..."/></p>
                <p class="input"><input name="address" type="text" size="25" placeholder="آدرس..."/></p>
                <p class="input"><input name="tel" type="text" size="25" placeholder="تلفن..."/></p>
                <p><input type="submit" class="submitbutton login" value="" name="btnlog"/>
                </p>
            </form>
            <ul>
                <li><a href="register.php"><span>عضویت در سایت</span></a></li>
                <li><a href="http://hub.najvahost.com/pwreset.php"><span>فراموشی کلمه عبور</span></a></li>
                <ul>
        </div></div>
    <div class="menu_bottom"></div>
</div>
</body>

</html>