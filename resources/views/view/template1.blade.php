<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{asset('')}}">
    @if(!empty($name))
    <title>{{$name->info}}</title>
    @endif
    <meta id="token" name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/template1/css/index.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <style>
        .intro .wrap {
            margin-top: 30px;
            margin-bottom: 0px;
        }

        .intro h1:before {
            /* Edit this with your name or anything else */
            content: "";
        }

        .contact .work-list li {
            list-style: none;
            font-size: 0.9rem;
            color: #727272;
            padding: 10px 10px;
            overflow: auto;
            box-shadow: 1px 1px 5px 0px grey;
            border-radius: 7px;
        }

        .contact .work-list li:hover {
            box-shadow: 0 2px 12px 0 rgb(0 0 0 / 10%);
            transform: scale(1.02);
            transition: 1s;
        }

        .section.second {
            margin-bottom: 20px;
        }
        h1, h2, h3, h4, h5, h6, p {
            font-family: "Lato",Arial,sans-serif;
            color: #333;
        }

        ul {
            margin-bottom: 0.65em;
        }
        .custom_icon {
            margin-right: 10px;
        }
        .intro .unit-20 img {
            box-shadow: 1px 1px 5px 0px grey;
        }

        .save_contact {
            width: 140px;
            margin: 0 auto;
            padding: 5px 10px;
            box-shadow: 1px 1px 5px 0px grey;
            border-radius: 5px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        .save_contact a{
            text-decoration: none;
        }

        .bank {
            display: flex;
            align-items: center;
        }

        .bank span {
            display: block;
        }

        .span12 {
            font-size: 13px;
            font-weight: normal;
        }
        a {
            text-decoration: none !important;
            border-bottom: none !important;
        }

        .save_contact img {
            width: 30px;
            height: 100%;
            border-radius: inherit;
        }


        @media (max-width: 767px) {
            h1 {
                font-size: 1.5em !important;
                line-height: 1.25;
                margin-bottom: 3px !important;
            }

            .intro h1 span {
                font-size: 22px;
            }

            .units-row.units-split.wrap {
                text-align: center;
            }
        }

    </style>
    @include('components.onesignal')
</head>
<body>
<div class="intro section" id="about">
    <div class="container">
        <div class="units-row units-split wrap">
            <div class="unit-20">
                @if(!empty($avatar))
                    <img src="{{$avatar->info}}" alt="Avatar">
                @endif
            </div>
            <div class="unit-80">
                <h1><span id="typed"></span></h1>
                <p>
                    @if(!empty($about))
                        {{$about->info}}
                    @endif
                </p>
                <div class="save_contact">
                    <img src="{{asset('assets/icon_template1/save_contact.png')}}" alt="">
                    <a href="{{asset('/save-contact/'.$userId)}}"> Lưu danh bạ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Work Experience -->
@if(count($contact))
<div class="work contact section second" id="experiences">
    <div class="container">
        <div style="font-size: 1.25rem">
            @foreach($contact as $value)
                @if($value->key === 'bank')
                    <ul class="work-list">
                        <li class="bank">
                            <span class="custom_icon"><img style="min-width:30px;" src="{{asset('assets/icon_template1/'.$value->key.'.png')}}" alt=""></span>

                            <div style="margin-left: 3px;">
                                <a>
                                <span class="title">{{$value->info}}</span>
                                <span class="span12">Chủ tài khoản: {{$value->info1}}</span>
                                <span class="span12">Số tài khoản: {{$value->info2}}</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                @elseif($value->key === 'note')
                    <ul class="work-list">
                        <li class="bank">
                            <span class="custom_icon"><img style="min-width:30px;" src="{{asset('assets/icon_template1/'.$value->key.'.png')}}" alt=""></span>

                            <div style="margin-left: 3px;">
                                <a>
                                    <span class="title">{{$value->info}}</span>
                                    <span class="span12">{{$value->info1}}</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                @elseif($value->key === 'email')

                    <ul class="work-list">
                        <li >
                            <a class="bank" href="mailto:{{$value->info}}">
                                <span class="custom_icon"><img style="min-width:30px;" src="{{asset('assets/icon_template1/'.$value->key.'.png')}}" alt=""></span>
                                <div style="margin-left: 3px;">
                                    <span class="title">Email</span>
                                    <span class="span12">{{$value->info}}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                @elseif($value->key === 'mobilephone')
                    <ul class="work-list">
                        <li >
                            <a class="bank" href="tel:{{$value->info}}">
                            <span class="custom_icon"><img style="min-width:30px;" src="{{asset('assets/icon_template1/'.$value->key.'.png')}}" alt=""></span>
                            <div style="margin-left: 3px;">
                                <span class="title">Số điện thoại</span>
                                <span class="span12">{{$value->info}}</span>
                            </div>
                            </a>
                        </li>
                    </ul>
                @elseif($value->key === 'website')
                    <ul class="work-list">
                        <li>
                            <a href="{{$value->info1}}"
                               target="_blank"
                               style="border: none;display: flex;align-items: center">
                                <span class="custom_icon"><img style="min-width:30px;" src="{{asset('assets/icon_template1/'.$value->key.'.png')}}" alt=""></span>
                                {{$value->info}}
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="work-list">
                        <li>
                            <a href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif"
                               target="_blank"
                               style="border: none">
                                <span class="custom_icon"><img src="{{asset('assets/icon_template1/'.$value->key.'.png')}}" alt=""></span>
                                {{getTextTemplate($value->key, $value->info)}}
                            </a>
                        </li>
                    </ul>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endif

<footer>

</footer>

<!-- Javascript -->

<script src="{{asset('assets/template1/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/template1/js/typed.min.js')}}"></script>
<script src="{{asset('assets/template1/js/kube.min.js')}}"></script>
<script src="{{asset('assets/template1/js/site.js')}}"></script>
<script>
  function newTyped(){}$(function(){$("#typed").typed({
    // Change to edit type effect
    strings: ["@if(!empty($name)){{$name->info}}@endif"],

    typeSpeed:90,backDelay:700,contentType:"html",loop:!0,resetCallback:function(){newTyped()}}),$(".reset").click(function(){$("#typed").typed("reset")})});
</script>
</body>
</html>
