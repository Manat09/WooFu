<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <style>
        footer{position: absolute;/*bottom: 0;*/left: 0;right: 0;background: #FFCE40;
            height: auto;width:100vw;padding-top:40px;color:#FF4500;}
        .footer-content{display: flex;align-items: center;justify-content: center;flex-direction: column;text-align: center;}
        .footer-content h3{font-size: 1.8rem;font-weight: 400;text-transform: capitalize;line-height: 3rem;}
        .footer-content p{max-width: 500px;margin: 10px auto;line-height: 28px;font-size: 14px;}
        .socials{list-style: none;display: flex;align-items: center;justify-content: center;margin: 1rem 0 3rem 0;}
        .socials li{margin: 0 10px;}
        .socials a{text-decoration: none;color: #FF4500;}
        .socials a i{font-size: 1.1rem;transition: color .4s ease;}
        .socials a:hover i{color: #0000ff;}
        .footer-bottom p{background: #FF2000;color: #ffffff;width: 100vw;padding: 20px 0;text-align: center;}
        .footer-bottom p{font-size: 14px;word-spacing: 2px;text-transform: capitalize;}
        .footer-bottom span{text-transform: uppercase;opacity: .4;font-weight: 200;}
        .nl{display: flex;border: 4px #ff0000;}
        .footer-content .input-box{color: #000000;background: #ffffff;padding: 5px;width: 250px;}
        .footer-content .submit-btn{background: #FF2000;color: #ffffff;width: 100px;}
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<!------FOOTER------->
<footer>
    <div class="footer-content">
        <h3>code opacity</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid, atque deserunt error quibusdam voluptate!</p>
        <p>SIGN UP FOR OUR NEWSLETTER</p>
        <form method="POST" action="#" name="newsletter" class="nl">
            <input type="email" class="input-box" name="email" placeholder="Your Email" required>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <ul class="socials">
            <li><a href="https://www.instagram.com/astana_it_university/?hl=ru" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCRUN152kvKPdLiYvcpOyFkQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li><a href="https://astanait.edu.kz/" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://telemetr.me/content/astanaituniversity" target="_blank"><i class="fab fa-telegram"></i></a></li>
            <li><a href="https://www.facebook.com/astanaituniversity/" target="_blank"><i class="fab fa-facebook"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy;2021 Astana IT University. designed be <span>IT-2007</span></p>
    </div>
</footer>
</html>

<?php
//mail(to, subject, message);

//$to = $_POST['email'];
//$subject = "CUSTOM WOOD FURNITURE";
//$message = '<p>You are welcomed by the online store for orders of wooden furniture.<br>
// You left your mail on our website, and now you can be one of the first to know our news, promotions and discounts.<br>
// Thank you for staying with us!</p>';
//
//$headers = "Content-type:text/html; charset = windows-1251 \r\n";
//$headers .= "From: woodFurn@gmail.com";
//$headers .= "Reply to woodFurn@gmail.com";
//
//mail($to,$subject,$message,$headers);
/////////////////////////////////////
/////////////////////////////////////
/////////////////////////////////////
//require_once('phpmailer/PHPMailerAutoload.php');
//$mail = new PHPMailer;
//$mail->CharSet = 'utf-8';
//
//$email = $_POST['email'];
//
//$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com';
//$mail->SMTPAuth = true;
//$mail->Username = 'woodFurn@gmail.com';
//$mail->Password = 'aswer9898';
//$mail->SMTPSecure = 'ssl';
//$mail->Port = 465;
//
//$mail->setForm('woodFurn@gmail.com');
//$mail->addAddress($email);
//
//$mail->isHTML(true);
//
//$mail->Subject = 'CUSTOM WOOD FURNITURE';
//$mail->Body = '<p>You are welcomed by the online store for orders of wooden furniture.<br>
// You left your mail on our website, and now you can be one of the first to know our news, promotions and discounts.<br>
// Thank you for staying with us!</p>';
//$mail->Answer = 'Reply to woodFurn@gmail.com';
//
//if(!$mail->send()){
//    echo 'Error';
//}else{
//    header('location;thank-you.html');
//}
?>