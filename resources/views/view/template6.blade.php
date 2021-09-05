<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(!empty($name))
            {{$name->info}}
        @endif</title>
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <meta name="description" content="Fendi Ali - Linktree, Neumorphism Soft UI Design. ">
    <meta name="keywords" content="Linktree, Bio Link, Template, neumorphism UI, Theme, Codepen, GitHub">
    <meta name="robots" content="index, follow">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merienda+One&display=swap');

        :root {
            --bg-color:#EBECF0;
            --color-w: #FFF;
            --color-s: #BABECC;
            --accent-color:#7E90F8;
            --font: 'Poppins',sans-serif;
            --feneumorphism: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            --feneumorphism-inset:inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
        }


        body {
            margin:0;
            padding:0;
            box-sizing: border-box;
            display:flex;
            font-size: 16px;
            flex-direction: column;
            font-family: var(--font);
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            letter-spacing: -0.2px;
            color: var(--color-s);
            text-shadow: 1px 1px 1px var(--color-w);
            background-color: var(--bg-color);
        }

        .container {
            /*padding:50px;*/
            /*max-width:1080px;*/
            margin:0 auto;
        }
        .bumderan {
            -moz-box-shadow: var(--feneumorphism-inset);
            -webkit-box-shadow: var(--feneumorphism-inset);
            box-shadow: var(--feneumorphism-inset);
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;

        }

        .fomto {
            width: 140px;
            height: 140px;
            background: var(--bg-color);
            background-image: url("https://www.fendiali.net/wp-content/uploads/2020/12/fxndx-logo.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            box-shadow: var(--feneumorphism);
        }
        .heamder {
            color: var(--color-s);
            text-align: center;
            margin-bottom:35px;
            margin-top:30px;
        }
        .heamder h1 {
            /*font-family: 'Merienda One', cursive;*/
            font-weight: 400;
            font-size: 18px;
        }
        .btn-tree {
            margin:20px 0;
            display: block;
            width: auto;
        }
        .btn-link {
            display: flex;
            align-items: center;
            font-family: var(--font);
            font-size:1em;
            font-weight: 500;
            border: 0;
            outline: 0;
            width:100%;
            background-color:var(--bg-color);
            color:var(--accent-color);
            padding:10px 10px;
            border-radius:12px;
            margin-bottom:20px;
            cursor: pointer;
            text-shadow: 1px 1px 0 var(--color-w);
            box-shadow: var(--feneumorphism);
            transition:background-color 300ms ease-in-out;
        }

        .btn-link:hover {
            box-shadow: var(--feneumorphism-inset);

        }
        .btn-link:active {
            box-shadow: var(--feneumorphism-inset);
        }
        .ngocok {
            animation: ngocok-animation 4.72s ease infinite;
            transform-origin: 50% 50%;
        }
        @keyframes ngocok-animation {
            0% { transform:translate(0,0) }
            1.78571% { transform:translate(5px,0) }
            3.57143% { transform:translate(0,0) }
            5.35714% { transform:translate(5px,0) }
            7.14286% { transform:translate(0,0) }
            8.92857% { transform:translate(5px,0) }
            10.71429% { transform:translate(0,0) }
            100% { transform:translate(0,0) }
        }

        footer {
            text-align: center;
        }
        footer a{
            color: var(--accent-color);
            text-decoration: none;
        }
        .heamder h1  {
            font-size: 2rem !important;
            color: var(--accent-color);
        }
        #about {
            font-weight: normal;
            font-size: 1em !important;
            color: var(--accent-color);

        }

        .save {
            width: 100%;
            text-align: center;
            padding-top: 15px;
        }

        a.save_contact {
            padding: 7px 15px;
            color: #7e90f8 !important;
            border-radius: 12px;
            font-family: var(--font);
            text-decoration: none;
            cursor: pointer;
            text-shadow: 1px 1px 0 var(--color-w);
            box-shadow: var(--feneumorphism);
        }

    </style>
    @include('components.onesignal')
</head>

<body>

<div class="container">
    <header class="heamder">
        @if(!empty($avatar))
            <img src="{{$avatar->info}}" class="bumderan fomto">
        @endif
        @if(!empty($name))
            <h1 style="margin-bottom: 0px">{{$name->info}}</h1>
        @endif
        @if(!empty($about))
            <p id="about">{{$about->info}}</p>
        @endif
        <div class="save">
            <a href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
        </div>
    </header>
    @if(count($contact))
    <main class="btn-tree">
        @foreach($contact as $value)
            <a
            style="text-decoration: none;"
            href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif">
            <button class="btn-link ngocok">
                <img style="margin-right: 10px; width: 35px;" class="logo" src="{{asset('assets/icon_template6/'.$value->key.'.png')}}"/>
                {{getTextTemplate($value->key, $value->info)}}
            </button>
            </a>
        @endforeach
    </main>
    @endif
    <footer style="height: 30px;">

    </footer>
</div>
</body>
</html>
