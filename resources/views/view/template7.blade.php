<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(!empty($name))
            {{$name->info}}
        @endif</title>
    <link rel="stylesheet" href="{{asset('assets/template7/style.css')}}">
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <style>
        .save {
            width: 100%;
            text-align: center;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        a.save_contact {
            padding: 6px 12px;
            color: #e6e6e6;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: 2px solid #e6e6e6;
        }
    </style>
    @include('components.onesignal')
</head>

<body>
<section class="animated-background">
    <div id="stars1"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
</section>

<a id="profilePicture">
    @if(!empty($avatar))
        <img src="{{$avatar->info}}" alt="Profile Picture">
    @endif
</a>
<div id="userName">
    @if(!empty($name))
        <h1>{{$name->info}}</h1>
    @endif
    @if(!empty($about))
        <p>{{$about->info}}</p>
    @endif
</div>
<div class="save">
    <a href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
</div>
@if(count($contact))
<div id="links">
    @foreach($contact as $value)
        <a
        href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif"
        class="link"
        target="_blank">
            <img style="width: 30px; margin-right: 10px" class="logo" src="{{asset('assets/icon_template7/'.$value->key.'.png')}}"/>
            {{getTextTemplate($value->key, $value->info)}}
        </a>
    @endforeach
</div>
@endif
</body>

</html>
