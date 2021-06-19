<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="account-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<!------menu-bar------>
<?php include("menubar.php"); ?>

<div class="container">
    <div class="card">
        <div class="inner-box" id="card">
            <div class="card-front">
                <h2>LOGIN</h2>
                <form method="POST" action="#" name="login">
                    <input type="number" class="input-box" name="phone" placeholder="Your Phone Number" required>
                    <input type="password" class="input-box" name="password" placeholder="Password" required>
                    <a href="person.php"><button type="button" class="submit-btn">Submit</button></a>
                    <input type="Checkbox"><span>Remember me </span>
                </form>
                <button type="button" class ="btn" onclick="openRegister()">I forgot my password</button>
                <button type="button" class ="btn" onclick="openRegister()">I'm here new</button>
            </div>
            <div class="card-back">
                <h2>REGISTER</h2>
                <form method="POST" action="#" name="register">
                    <input type="text" class="input-box" name="name" placeholder="Your Name" required>
                    <input type="email" class="input-box" name="email" placeholder="Your Email" required>
                    <input type="number" class="input-box" name="phone" placeholder="Your Phone Number" required>
                    <input type="password" class="input-box" name="password" placeholder="Password" required>
                    <a href="person.php"><button type="submit" class="submit-btn">Submit</button></a>
                    <input type="Checkbox"><span>Remember me </span>
                </form>
                <button type="button" class ="btn" onclick="openLogin()" >I have an account</button>
            </div>
        </div>
    </div>
</div>
<script>
    var card = document.getElementById("card");
    function openRegister(){
        card.style.transform= "rotateY(-180deg)";
    }
    function openLogin(){
        card.style.transform= "rotateY(0deg)";
    }
</script>
<!------FOOTER------->
<?php include("footer.php"); ?>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "code_lab";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, email, phone,password) VALUES('$name','$email', '$phone', '$password')";

if ($conn->query($sql) === TRUE) {
    /*echo "<script>alert('New account created successfully!')</script>";*/
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>