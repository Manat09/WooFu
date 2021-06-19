<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <style>
        *{margin: 0;padding: 0;box-sizing: border-box;}
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body{background: linear-gradient(to right, rgba(235,224,232,1) 52%,rgba(254,191,1,1) 53%,rgba(254,191,1,1) 100%);font-family: 'Roboto', sans-serif}
        .card{border: none;max-width: 450px;border-radius: 15px;margin: 150px 0 150px;padding: 35px;padding-bottom: 20px!important}
        .heading{color: #C1C1C1;font-size: 14px;font-weight: 500}
        img{transform: translate(80px,-10px)}
        img:hover{cursor: pointer}
        .text-warning{font-size: 12px;font-weight: 500;color: #edb537!important}
        #cno{transform: translateY(-10px)}
        input{border-bottom: 1.5px solid #E8E5D2!important;font-weight: bold;border-radius: 0;border: 0}
        .form-group input:focus{border: 0;outline: 0}
        .col-sm-5{padding-left: 90px}
        .btn{background: #F3A002!important;border: none;border-radius: 30px}
        .btn:focus{box-shadow: none}
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</head>
<body oncontextmenu="return false">
<?php include("menubar.php"); ?>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card mx-auto">
                <p class="heading">PAYMENT DETAILS</p>
                <form class="card-details ">
                    <div class="form-group mb-0">
                        <p class="text-warning mb-0">Card Number</p>
                        <input type="text" name="card-num" placeholder="1234 5678 9012 3457" size="17" id="cno" minlength="19" maxlength="19">
                        <img src="https://img.icons8.com/color/48/000000/mastercard.png" width="64px" height="60px">
                        <img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px">
                    </div>
                    <div class="form-group">
                        <p class="text-warning mb-0">Cardholder's Name</p>
                        <input type="text" name="name" placeholder="Name" size="17">
                    </div>
                    <div class="form-group pt-2"> <div class="row d-flex">
                            <div class="col-sm-4">
                                <p class="text-warning mb-0">Expiration</p>
                                <input type="text" name="exp" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7">
                            </div>
                            <div class="col-sm-3">
                                <p class="text-warning mb-0">Cvv</p>
                                <input type="password" name="cvv" placeholder="●●●" size="1" minlength="3" maxlength="3">
                            </div>
                            <div class="col-sm-5 pt-0">
                                <button type="button" class="btn btn-primary"><i class="fas fa-arrow-right px-3 py-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php include("footer.php"); ?>
</html>

<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "code_lab";
//
//$conn = new mysqli($servername, $username, $password, $dbname);
//if ($conn->connect_error) {
//die("Connection failed: " . $conn->connect_error);
//}
//$name = $_POST['name'];
//$email = $_POST['email'];
//$phone = $_POST['phone'];
//$password = $_POST['password'];
//
//$sql = "INSERT INTO users (name, email, phone,password) VALUES('$name','$email', '$phone', '$password')";
//
//if ($conn->query($sql) === TRUE) {
///*echo "<script>alert('New account created successfully!')</script>";*/
//} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
//}
//
//$conn->close();
//
//?>
