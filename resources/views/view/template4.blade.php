<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @if(!empty($name))
            {{$name->info}}
        @endif</title>
    <link rel="shortcut icon"  href="{{asset('assets/template2/image/icon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/template4/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <style>
        .save {
            width: 100%;
            text-align: center;
            margin-bottom: 30px;
            margin-top: 25px;
        }

        a.save_contact {
            padding: 5px 10px;
            border: 2px solid white;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
    @include('components.onesignal')
    <style>
        #onesignal-bell-container.onesignal-reset .onesignal-bell-launcher.onesignal-bell-launcher-theme-default .onesignal-bell-launcher-button svg .background {
            fill: #000000 !important;
        }
    </style>
</head>

<body>
<a class="profilePicture">
    @if(!empty($avatar))
        <img src="{{$avatar->info}}" alt="Avatar">
    @endif
</a>

<div class="userName">
    @if(!empty($name))
        {{$name->info}}
    @endif
</div>

<div class="description">
    @if(!empty($about))
        {{$about->info}}
    @endif
</div>
<div class="save">
    <a href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
</div>
@if(count($contact))
    <div class="links">
        @foreach($contact as $value)
            <a
            class="link"
            href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif"
            target="_blank">
                <img style="width: 35px; margin-right: 10px" class="logo" src="{{asset('assets/icon_template4/'.$value->key.'.png')}}"/>
                {{getTextTemplate($value->key, $value->info)}}
            </a>
        @endforeach
    </div>
@endif

<div style="height: 30px" class="source">
</div>

</body>

</html>
