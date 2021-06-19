<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slider</title>
    <style>
        .slider-body {padding-top: 35px;padding-bottom: 120px;}
        .flex-wrapper {width: 100%;display: flex;justify-content: center;}
        .slider-wrapper {max-width: 800px;width: 100%;height: 490px;position: relative;box-shadow: 10px 10px 44px -10px rgba(0,0,0,0.75);}
        #btn-prev, #btn-next {position: absolute;left: 0;top: 0;height: 100%;width: 50px;background-color: gray;opacity: 0.4;cursor: pointer;transition: opacity .2s ease-in-out;}
        #btn-prev:hover, #btn-next:hover {opacity: 0.6;}
        #btn-next {left: auto;right: 0;}  .slide {width: 100%;height: 100%;display: none;}  .slide.active {display: block;}
        .slider-wrapper img {width: 100%;height: 100%;}
        .dots-wrapper {display: flex;justify-content: center;margin-top: 15px;}  .dot.active {background-color: #000000;}
        .dots-wrapper span {width: 15px;height: 15px;border-radius: 50%;background-color: gray;margin-right: 10px;cursor: pointer;}
        span:last-child{margin-right: 0;}
    </style>
</head>
<body>
<div class="slider-body">
    <div class="flex-wrapper">
        <div class="slider-wrapper">
            <div class="slide active">
                <img src="https://i.ibb.co/F3fp686/banner-2.jpg" alt="">
            </div>
            <div class="slide">
                <img src="https://i.ibb.co/PT46Hqs/banner-3.jpg" alt="">
            </div>
            <div class="slide">
                <img src="https://i.ibb.co/p3vJNyv/banner-1.jpg" alt="">
            </div>
            <div id="btn-prev"></div>
            <div id="btn-next"></div>
        </div>
    </div>
    <div class="dots-wrapper">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>
</body>
<script>
    const prev = document.getElementById('btn-prev'),
        next = document.getElementById('btn-next'),
        slides = document.querySelectorAll('.slide'),
        dots = document.querySelectorAll('.dot');

    let index = 0;

    const activeSlide = n => {
        for(slide of slides) {
            slide.classList.remove('active');
        }
        slides[n].classList.add('active');
    }

    const activeDot = n => {
        for(dot of dots) {
            dot.classList.remove('active');
        }
        dots[n].classList.add('active');
    }

    const prepareCurrentSlide = ind => {
        activeSlide(index);
        activeDot(index);
    }

    const nextSlide = () => {
        if(index == slides.length - 1) {
            index = 0;
            prepareCurrentSlide(index);
        }else {
            index++;
            prepareCurrentSlide(index);
        }
    }

    const prevSlide = () => {
        if(index == slides.length - 1) {
            index = 0;
            prepareCurrentSlide(index);
        }else {
            index++;
            prepareCurrentSlide(index);
        }
    }

    dots.forEach((item, indexDot)=> {
        item.addEventListener('click', () => {
            index = indexDot;
            prepareCurrentSlide(index);
        })
    })

    next.addEventListener('click', nextSlide);
    prev.addEventListener('click', prevSlide);
    setInterval( nextSlide, 2500 );
</script>
</html>
