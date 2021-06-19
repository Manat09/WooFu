<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Bar</title>
    <style>
        .menu-bar{margin-top: 0;background: #FFCE40;text-align: center;}
        .menu-bar ul{display: inline-flex;list-style: none;font-size: 20px;margin-right: 20px;}
        .menu-bar ul li{width: 200px;margin: 15px;padding: 15px;color: #FF4500;}
        .menu-bar ul li:hover{background: #FFef40;border-radius: 4px;}
    </style>
</head>
<body>
<div class="menu-bar">
    <ul>
        <li style="width: 70px;"><?php include("darkmode.php"); ?></li>
        <a href="index.php"><li class="fa fa-home"> Home</li></a>
        <a href="catalog.php"><li class="fa fa-bars"> Catalog</li></a>
        <a href="about.php"><li class="fa fa-users"> About us</li></a>
        <a href="contact.php"><li class="fa fa-phone"> Contacts</li></a>
        <a href="account.php"><li class="fa fa-user"> Account</li></a>
        <a href="example21.php"><li class="fa fa-shopping-cart"></li></a>
    </ul>
</div>
</body>
</html>