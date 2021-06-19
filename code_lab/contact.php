<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="contact_style.css">
</head>
<body>
<!------menu-bar------>
<?php include("menubar.php"); ?>

<!------------Contacts-------------->
<div class="contact-page">
    <h2>Get in touch</h2>
    <div class="contact-info">
        <div class="item">
            <i class="icon fas fa-phone"></i>
            +7 700 200 10 50
        </div>
        <div class="item">
            <i class="icon fas fa-envelope"></i>
            email@address.com
        </div>
        <div class="item">
            <i class="icon fas fa-clock"></i>
            Mon - Fri 8:00 AM to 6:00 PM
        </div>
    </div>
    <form action="" class="contact-form">
        <input type="text" class="textb" placeholder="Your Name">
        <input type="email" class="textb" placeholder="Your Email">
        <textarea placeholder="Your Message"></textarea>
        <input type="submit" class="btn" value='Send'>
    </form>
</div>

<!------FOOTER------->
<?php include("footer.php"); ?>

</body>
</html>