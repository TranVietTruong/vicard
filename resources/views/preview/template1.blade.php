<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{asset('')}}">
    <title>Draco by @flamekaizar</title>
    <meta id="token" name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Draco is free PSD &amp; HTML template by @flamekaizar">
    <meta name="author" content="Afnizar Nur Ghifari">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/template1/css/index.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
        .intro h1:before {
            /* Edit this with your name or anything else */
            content: 'nvh';
        }
    </style>
</head>
<body>
{{--<!-- Navigation -->--}}
{{--<div class="main-nav">--}}
{{--    <div class="container">--}}
{{--        <header class="group top-nav">--}}
{{--            <div style="margin-bottom: 1.65em" class="navigation-toggle" data-tools="navigation-toggle" data-target="#navbar-1">--}}
{{--                <span class="logo"></span>--}}
{{--            </div>--}}
{{--            <nav id="navbar-1" class="navbar item-nav">--}}
{{--                <ul>--}}
{{--                    <li style="margin-bottom: 10px" class="active"><a href="#about">Home</a></li>--}}
{{--                    <li style="margin-bottom: 10px"><a href="#experiences">Giới thiệu</a></li>--}}
{{--                    <li style="margin-bottom: 10px"><a href="#achievements">Liên hệ</a></li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </header>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Introduction -->
<div class="intro section" id="about">
    <div class="container">
        <div class="units-row units-split wrap">
            <div class="unit-20">
                <img src="{{asset('assets/template1/img/ava.jpg')}}" alt="Avatar">
            </div>
            <div class="unit-80">
                <h1><span id="typed"></span></h1>
                <p>
                    Tư vấn giải pháp marketing hàng đầu cho doanh nghiệp
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Award & Achievements -->
<div class="award section second" id="achievements">
    <div class="container">
        <h1> &amp; VỀ TÔI<br></h1>
        <div class="award-list list-flat">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius voluptatum molestiae illo, quisquam odio quod corporis, non explicabo. Quos, voluptates vel ad tempora ipsum perspiciatis, consectetur ut esse. Adipisci, odit.</p>
        </div>
    </div>
</div>

<!-- Work Experience -->
<div class="work section second" id="experiences">
    <div class="container">
        <h1>THÔNG TIN LIÊN HỆ</h1>
        <div style="font-size: 1.25rem">
            <ul class="work-list">
                <li><span class="fa fa-phone custom_icon"></span>Số điện thoại</li>
            </ul>
            <ul class="work-list">
                <li><span class="fa fa-envelope custom_icon"></span>Email</li>
            </ul>
            <ul class="work-list">
                <li><span class="fab fa-facebook-square custom_icon"></span>Facebook</li>
            </ul>
            <ul class="work-list">
                <li><span class="fa fa-instagram custom_icon"></span>Instagram</li>
            </ul>
            <ul class="work-list">
                <li><span class="custom_icon"><img src="{{asset('assets/template1/img/zalo.png')}}" alt=""></span>Zalo</li>
            </ul>
            <ul class="work-list">
                <li><span class="fa fa-skype custom_icon"></span>Skype</li>
            </ul>
            <ul class="work-list">
                <li><span class="fab fa-tiktok custom_icon"></span>Tiktok</li>
            </ul>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="units-row">
            <div class="unit-50">
                <p>©2021tranvietruong - All rights reserved.</p>
            </div>
            <div class="unit-50">
                <ul class="social list-flat right">
                    <li><a href="mailto:afnizarhilmi@gmail.com"><i class="fa fa-send"></i></a></li>
                    <li><a href="http://twitter.com/flamekaizar"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="http://dribbble.com/flamekaizar"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="http://behance.com/flamekaizar"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Javascript -->

<script src="{{asset('assets/template1/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/template1/js/typed.min.js')}}"></script>
<script src="{{asset('assets/template1/js/kube.min.js')}}"></script>
<script src="{{asset('assets/template1/js/site.js')}}"></script>
<script>
  function newTyped(){}$(function(){$("#typed").typed({
    // Change to edit type effect
    strings: ["NGUYỄN VĂN HẢI"],

    typeSpeed:90,backDelay:700,contentType:"html",loop:!0,resetCallback:function(){newTyped()}}),$(".reset").click(function(){$("#typed").typed("reset")})});
</script>
</body>
</html>
