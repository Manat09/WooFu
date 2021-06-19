<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/mustard-ui@latest/dist/css/mustard-ui.min.css">
    <style>
        *{margin: 0;padding: 0;box-sizing: border-box;}
        /*===============MENU-BAR===========================*/
        .menu-bar{margin-top: 0;background: #FFCE40;text-align: center; /* position: fixed;*/}
        .menu-bar ul{display: inline-flex;list-style: none;font-size: 20px;margin-right: 20px;}
        .menu-bar ul li{width: 200px;margin: 15px;padding: 15px;color: #FF4500;}
        .fa-bars, .menu-bar ul li:hover{background: #FFef40;border-radius: 4px;}
        /*===============SEARCH-BOX=========================*/
        #elastic {text-align: center;}
        #elastic {height: 40px;width: 1000px;align-items: center;border-radius: 10px;font-size: 24px;}
        .search-box1 {margin-left: 250px;margin-top: 25px;display: flex;align-items: center;}
        .search-btn1 {border-radius: 50%;background: #ff4500;width: 40px;height: 40px;color: #fff;align-items: center;display: flex;}
        i.fa.fa-search {margin: auto;}
        ul.elastic{margin-top:60px; margin-left:40px; font-size: 26px;}
        ul li{/*display: none;*/list-style: none;}
        .elastic li.hide{display: none;}
        /******************************/
        body{font-family: 'Poppins', sans-serif;}
        a{text-decoration: none;color: #FF4500;}
        @media screen and (max-width: 1200px){  .blog-posts{justify-content: center;}.post{width: min(600px, 100%);}}
        @-webkit-keyframes fade{ from{opacity:.4} to{opacity: 1} }
        @keyframes fade{ from{opacity:.4} to{opacity: 1} }  .small-container h2{text-align: center;}
        /*li.elastic.\31 {*/
        /*    display: inline-block;*/
        /*}*/
        /*li.elastic.\32 {*/
        /*    display: inline-block;*/
        /*}*/
    </style>
</head>
<!------menu-bar------>
<div class="menu-bar">
    <ul>
        <li class="fa fa-home"> Home</li>
        <a href="catalog.php"><li class="fa fa-bars"> Catalog</li></a>
        <a href="about.php"><li class="fa fa-users"> About us</li></a>
        <a href="contact.php"><li class="fa fa-phone"> Contacts</li></a>
        <a href="account.php"><li class="fa fa-user"> Account</li></a>
        <a href="example21.php"><li class="fa fa-shopping-cart"></li></a>
    </ul>
</div>
<!------search-box----->
<div class="search-box1">
    <label>
        <input id="elastic" type="text" name="" placeholder="Type to search">
    </label>
    <a class="search-btn1" href="#">
        <i class="fa fa-search"></i>
    </a>
</div>




<!--------------------------------------------------------------------------------->

<ul class="elastic">
    <li class="elastic 1">
        <img src="https://i.ibb.co/yhjjQBS/q5.jpg" alt="" class="post-img">
        Table
    </li>
    <li class="elastic 1">
        <img src="https://i.ibb.co/ZNcKThb/q2.jpg" alt="" class="post-img">
        Chair
    </li>
    <li class="elastic 1">
        <img src="https://i.ibb.co/fq38Lyj/q1.webp" alt="" class="post-img">
        Shelf
    </li>
    <li class="elastic 1">
        <img src="https://i.ibb.co/r6GM0zQ/q7.jpg" alt="" class="post-img">
        BookShelf
    </li>
    <li class="elastic 2">
        <img src="https://i.ibb.co/F4wkyR8/q4.jpg" alt="" class="post-img">
        Shelf
    </li>
    <li class="elastic 2">
        <img src="https://i.ibb.co/hMqbbCx/cat-3.jpg" alt="" class="post-img">
        Bed
    </li>
    <li class="elastic 2">
        <img src="https://i.ibb.co/CQvbmqN/q3.webp" alt="" class="post-img">
        Table
    </li>
    <li class="elastic 2">
        <img src="https://i.ibb.co/ZNcKThb/q2.jpg" alt="" class="post-img">
        Chair
    </li>
</ul>

<!------FOOTER------->
<script>
    document.querySelector('#elastic').oninput = function (){
        let val = this.value.trim();
        let elasticItems = document.querySelectorAll('.elastic li');
        if(val !== ''){
            elasticItems.forEach(function (elem){
                if(elem.innerText.search(val) === -1){
                    elem.classList.add('hide');
                }
                else{
                    elem.classList.remove('hide');
                }
            });
        }
        else{
            elasticItems.forEach(function (elem){
                elem.classList.remove('hide');
            });
        }
    }
</script>
</body>
</html>











