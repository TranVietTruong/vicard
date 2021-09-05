<?php
    function renderColor($index)
    {
        $color = [
            '#8e2de2, #4a00e0',
            '#0866C2, #044d96',
            '#2673ca, #346485',
            '#9676FC, #765dca',
            '#8e2de2, #e2c72d'
        ];
        if(isset($color[$index]))
            return $color[$index];

        $index = rand(0, count($color) - 1);
        return $color[$index];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(!empty($name))
            {{$name->info}}
        @endif
    </title>
    <link rel="stylesheet" href="{{asset('assets/template8/style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .save {
            width: 100%;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 25px;
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
<main>
    <header>
        <div class="head_info">
            @if(!empty($avatar))
                <img src="{{$avatar->info}}" alt="luizeduardomr">
            @endif
            <div class="save">
                <a href="{{asset('/save-contact/'.$userId)}}" class="save_contact">Lưu danh bạ</a>
            </div>

            <h1 style="text-align: center">
                @if(!empty($name))
                    {{$name->info}}
                @endif
            </h1>
            <p style="text-align:center">
                @if(!empty($about))
                    {{$about->info}}
                @endif
            </p>
        </div>
    </header>

    @if(count($contact))
    <section>
        <ul>
            @foreach($contact as $key => $value)
                @if($value->key == 'mobilephone')
                    <a href="tel:{{$value->info}}" target="_blank" rel="noopener">
                        <li
                            style="background: linear-gradient(to right, {{renderColor($key)}});">
                            <img src="{{asset('assets/icon_template8/'.$value->key.'.png')}}">
                        </li>
                        <h3>Điện thoại</h3>
                        <span class='username'>{{$value->info}}</span>
                    </a>
                @elseif($value->key == 'email')
                    <a href="mailto:{{$value->info}}" target="_blank" rel="noopener">
                        <li
                            style="background: linear-gradient(to right, {{renderColor($key)}});">
                            <img src="{{asset('assets/icon_template8/'.$value->key.'.png')}}">
                        </li>
                        <h3>Email</h3>
                        <span class='username'>{{$value->info}}</span>
                    </a>
                @elseif($value->key == 'bank')
                    <a href="#" target="_blank" rel="noopener">
                        <li
                            style="background: linear-gradient(to right, {{renderColor($key)}});">
                            <img src="{{asset('assets/icon_template8/'.$value->key.'.png')}}">
                        </li>
                        <h3>Tài khoản ngân hàng</h3>
                        <span class='username'>{{$value->info}}</span>
                    </a>
                @else
                    <a href="{{$value->info}}" target="_blank" rel="noopener">
                        <li
                            style="background: linear-gradient(to right, {{renderColor($key)}});">
                            <img src="{{asset('assets/icon_template8/'.$value->key.'.png')}}">
                        </li>
                        <h3>{{getTextTemplate($value->key, $value->info)}}</h3>
                    </a>
                @endif
            @endforeach

        </ul>
    </section>
    @endif
</main>
<script>
  feather.replace()
</script>
</body>
</html>
