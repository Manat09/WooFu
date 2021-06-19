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
        ul li{
            /*display: none;*/
            list-style: none;
        }
        .elastic li.hide{
            display: none;
        }
        /*.search-box1{position: absolute;transform: translate(-50%, -50%);background: #ffffff;height: 40px;border-radius: 40px;margin-top: 35px;border: 2px #FF4500;margin-left: 145px;}*/
        /*.search-btn1{color: #ffffff;float: right;width: 40px;height: 40px;border-radius: 50%;background: #FF4500;display: flex;justify-content: center;align-items: center;transition: 0.4s;}*/
        /*.search-box1:hover > .search-txt{width: 200px;padding: 0 6px;background: #FFCE40;border-radius: 20px;}*/
        /*.search-box1:hover > .search-btn1{background: #ffffff;color: #FF4500;}*/
        /*.search-txt{border: 10px;background: none;outline: none;float: left;padding: 0;color: #000000;font-size: 16px;transition: 0.4s;line-height: 40px;width: 0;}*/
        /*!*=======================================*!*/
        body{font-family: 'Poppins', sans-serif;}
        a{text-decoration: none;color: #FF4500;}
        /*===============PRODUCTS===========================*/
        .box1, .box2{display: flex;margin-left: 50px;margin-right: 50px;}
        .blog-posts{width: min(1200px, 100%);padding: 20px;display: flex;justify-content: space-around;flex-wrap: wrap;cursor: pointer;}
        .post{width: calc(70% - 10px);overflow: hidden;}
        .post-img{width: 270px;border-radius: 6px;transition: .3s linear}
        .post-content{background-color: #FFCE40;margin: 0 20px;padding: 30px;border-radius: 6px;transform: translateY(-30px);transition: .3s linear;}
        .post-content h3{font-size: 16px;margin-bottom: 10px;}
        .date{font-size: 15px;font-style: italic;color: #FF4500;}
        .post:hover .post-img{transform: translateY(20px);}
        .post:hover .post-content{transform: translateY(-80px);}
        @media screen and (max-width: 1200px){  .blog-posts{justify-content: center;}.post{width: min(600px, 100%);}}
        @-webkit-keyframes fade{ from{opacity:.4} to{opacity: 1} }
        @keyframes fade{ from{opacity:.4} to{opacity: 1} }  .small-container h2{text-align: center;}
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


<!-----featured products----->
<div class="small-container">
    <h2>Featured Products</h2>
</div>

<!--------------------------------------------------------------------------------->

    <ul class="elastic">
<div class="box1" id="2">
    <div class="blog-posts">
        <a href="example.php" target="_blank">
        <li>Curbstone
            <div class="post">
                <img src="https://i.ibb.co/fq38Lyj/q1.webp" alt="" class="post-img"></a>
        <div class="post-content">
            <h3>Curbstone</h3>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <span class="date">$32</span>
        </div>
            </div>
    </li>
    </div>
    <div class="blog-posts">
<li>Chair
        <div class="post">
            <img src="https://i.ibb.co/ZNcKThb/q2.jpg" alt="" class="post-img">
            <div class="post-content">
            <h3>Chair</h3>
                <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                </div>
            <span class="date">$24</span>
            </div>
        </div>
        </li>
    </div>
    <div class="blog-posts">
<li>Table
    <div class="post">
        <img src="https://i.ibb.co/CQvbmqN/q3.webp" alt="" class="post-img">
        <div class="post-content">
            <h3>Table</h3>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <span class="date">$140</span>
        </div>
    </div>
</li>
    </div>
    <div class="blog-posts">
<li>Curbstone
    <div class="post">
        <img src="https://i.ibb.co/WGXtmm5/q8.jpg" alt="" class="post-img">
        <div class="post-content">
            <h3>Curbstone</h3>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <span class="date">$138</span>
        </div>
    </div>
</li>
    </div>
</div>
<div class="box2">
    <div class="blog-posts">
        <li>Bed
        <div class="post">
            <img src="https://i.ibb.co/hMqbbCx/cat-3.jpg" alt="" class="post-img">
            <div class="post-content">
                <h3>Bed</h3>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <span class="date">$170</span>
            </div>
        </div>
        </li>
    </div>
    <div class="blog-posts">
        <li>Curbstone
        <div class="post">
            <img src="https://i.ibb.co/F4wkyR8/q4.jpg" alt="" class="post-img">
            <div class="post-content">
                <h3>Curbstone</h3>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <span class="date">$130</span>
            </div>
        </div>
        </li>
    </div>
    <div class="blog-posts">
        <li>Table
        <div class="post">
            <img src="https://i.ibb.co/yhjjQBS/q5.jpg" class="post-img">
            <div class="post-content">
                <h3>Table</h3>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <span class="date">$112</span>
            </div>
        </div>
        </li>
    </div>
    <div class="blog-posts">
        <li>Bookshelf
        <div class="post">
            <img src="https://i.ibb.co/r6GM0zQ/q7.jpg" alt="" class="post-img">
            <div class="post-content">
                <h3>Bookshelf</h3>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <span class="date">$48</span>
            </div>
        </div></li>
    </div>
</div>
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










