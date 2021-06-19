<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dark Mode</title>
    <style>
        .change-block{display: flex;background-color: #00EAFF;transition: 0.5s;}
        .sun{color: #ffaa00;padding: 3px 6px;background-color: #00EAFF;display: none;}
        .sun span{font-size: 18px;}
        .moon{padding: 5px;background-color: #011155;}
        .dark-mode{background-color: rgb(2, 0, 3); transition: 0.5s;}
        .dark-mode .sun { display: flex;}
        .dark-mode .moon { display: none;}
        .dark-mode h1, .dark-mode h2, .dark-mode h3, .dark-mode .menu-bar ul li{color: #6a6969;}
        .dark-mode span, .dark-mode p{color: white;}
        .dark-mode .sun span{color:#ffaa00;}
        .dark-mode .menu-bar, .dark-mode .post-content, .dark-mode footer{background: #282828;}
        .dark-mode .menu-bar ul li:hover{background: #070707;border-radius: 4px;}
        .dark-mode .footer-content .submit-btn, .dark-mode .footer-bottom p{background: rgb(2, 0, 3);}
        .dark-mode .card-front, .dark-mode .card-back{background-image: linear-gradient(rgba(83, 83, 83, 0.8), rgba(21, 15, 15, 0.8)),url(https://www.enjpg.com/img/2020/naruto-uzumaki-11.jpg);}
    </style>
</head>
<body>
<button onclick="myFunction()">
    <div class="change-block">
        <div class="sun"><span>&#9728;</span></div>
        <div class="moon"><span>&#127769;</span></div>
    </div>
</button>
</body>

<script>
    function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }
</script>
</html>
