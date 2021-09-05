<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{asset('icon.png')}}">

    <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/template3/css/global.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/template3/css/styles.css')}}" />
    <title>
        @if(!empty($name))
            {{$name->info}}
        @endif
    </title>
    @include('components.onesignal')
</head>
<body class="fadeIn">
<main>
    <!-- Profile picture -->
    <div class="pic">
        @if(!empty($avatar))
            <img class="profile" src="{{$avatar->info}}"/>
        @endif
    </div>

    <!-- Profile name -->
    @if(!empty($name))
        <h1 style="font-size: 2rem; text-align: center" class="profile-name">{{$name->info}}</h1>
    @endif

    @if(!empty($about))
        <p style="margin-bottom: 30px; font-size: 15px; text-align: center;">{{$about->info}}</p>
    @endif
    <a style="text-decoration:none" href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
    <!-- Links -->
    @if(count($contact))
        @foreach($contact as $value)
            <a
                class="link"
                href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif"
                target="_blank">
                    <img class="logo" src="{{asset('assets/icon_template3/'.$value->key.'.png')}}"/>
                {{getTextTemplate($value->key, $value->info)}}
            </a>
        @endforeach
    @endif
</main>
<footer>

</footer>
</body>
</html>

<!-- https://www.youtube.com/watch?v=UaYriA15zoc -->
