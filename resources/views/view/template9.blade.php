<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#00BCD4" />
    <title>@if(!empty($name))
            {{$name->info}}
        @endif</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;500;700&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('assets/template9/style.css')}}" />
    <style>
        .save {
            text-align: center;
            padding-bottom: 15px;
        }

        a.save_contact {
            padding: 7px 15px;
            color: white;
            border-radius: 5px;
            background: #947642;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
    @include('components.onesignal')
</head>
<body>
@if(!empty($avatar))
<img
        class="avatar"
    src="{{$avatar->info}}"
    width="460"
    height="460"
    alt="Guilherme Balog Gardino"
/>
@endif
<header>
    @if(!empty($name))
        <h1>{{$name->info}}</h1>
    @endif
    @if(!empty($about))
        <p style="margin-top: 10px">{{$about->info}}</p>
    @endif
</header>
<div class="save">
    <a href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
</div>
@if(count($contact))
<nav>
    <ul>
        @foreach($contact as $value)
            <li class="link">
                <a
                @if(in_array($value->key, ['email', 'bank']))
                    @if(strlen($value->info) > 15 && strlen($value->info) <= 20)
                        style="font-size: 1rem"
                    @elseif(strlen($value->info) > 20 && strlen($value->info) <= 25)
                        style="font-size: 0.9rem"
                    @elseif(strlen($value->info) > 25)
                        style="font-size: 0.8rem"
                    @endif
                @endif
                href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif">
                    <img style="width: 35px; margin-right: 10px" src="{{asset('assets/icon_template9/'.$value->key.'.png')}}">
                    {{getTextTemplate($value->key, $value->info)}}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
@endif
<script>
  function random_bg_color() {
    var x = Math.floor(Math.random() * 200);
    var y = Math.floor(Math.random() * 150);
    var z = Math.floor(Math.random() * 150);
    var bgColor = "rgb(" + x + "," + y + "," + z + ")";
    return bgColor;
  }

  var links = Array.from(document.getElementsByClassName('link'));
  links.forEach((link) => {
    link.setAttribute("style", "--link-color: "+random_bg_color()+";");
  });
</script>
</body>
</html>
