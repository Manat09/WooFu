<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="person_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="menu-bar">
    <ul>
        <a href="index.php"><li class="fa fa-home"> Home</li></a>
        <a href="catalog.php"><li class="fa fa-bars"> Catalog</li></a>
        <a href="about.php"><li class="fa fa-users"> About us</li></a>
        <a href="contact.php"><li class="fa fa-phone"> Contacts</li></a>
        <li class="fa fa-user"> Account</li>
        <a href="example21.php"><li class="fa fa-shopping-cart"></li></a>
    </ul>
</div>

<!--------Description----------->
<div class="description">
    <h1>Your Profile</h1>
</div>

<!--------Profile-Card----------->
<div class="cards-1">
    <div class="profile-card">
        <div class="card-header">
            <div class="pic">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Gnome-stock_person.svg/600px-Gnome-stock_person.svg.png" alt="">
            </div>
            <div class="name">Name</div>
            <div class="desc">qwe@gmail.com<br>87778889999</div>
            <a href="account.php" class="contact-btn">Log Out</a>
        </div>
    </div>
</div>
<br><br><br>
<!------FOOTER------->
<?php include("footer.php"); ?>
<script>alert('New account created successfully!')</script>
</body>
</html>
