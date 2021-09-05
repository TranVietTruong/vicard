<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>
        @if(!empty($name))
            {{$name->info}}
        @endif
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/template5/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <style>
        .save {
            width: 100%;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 25px;
            font-size: 14px;
        }

        a.save_contact {
            padding: 7px 15px;
            border: 1px solid #ad88e4;
            color: #0056b3 !important;
            border-radius: 15px;
            font-family: var(--font);
            text-decoration: none;
        }
    </style>
    @include('components.onesignal')
</head>

<body>
@if(!empty($avatar))
<img id="userPhoto" src="{{$avatar->info}}" alt="User Photo">
@endif

<div class="save">
    <a href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
</div>
<a style="font-size: 1.5rem" href="#" id="userName" >
    <span id="typed1"></span>
</a>
@if(count($contact))
    <div id="links">
        @foreach($contact as $value)
            <a
            class="link"
            href="@if($value->key == 'mobilephone')tel:{{$value->info}}@elseif($value->key == 'email')mailto:{{$value->info}}@elseif($value->key == 'bank')#@else{{$value->info}}@endif"
            target="_blank">
                <img style="margin-right: 10px" class="logo" src="{{asset('assets/icon_template5/'.$value->key.'.png')}}"/>
                {{getTextTemplate($value->key, $value->info)}}
            </a>
        @endforeach
    </div>
@endif
<footer>

</footer>

<!-- Javascript -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.9/typed.min.js" async defer></script>
<script>
  window.onload=function(){console.log("loaded")
    var typed=new Typed('#typed1',{strings:["@if(!empty($name)){{$name->info}}@endif","@if(!empty($about)){{$about->info}}@endif"],backSpeed:30,smartBackspace:true,backDelay:2500,startDelay:400,typeSpeed:50,loop:true,});};
</script>

</body>
</html>
