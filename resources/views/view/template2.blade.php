<!--Mã nguồn thẻ CARD VISIT ĐIỆN TỬ - tiếng việt-->
<!--Thay thế thông tin của bạn vào trong những chỗ có dấu /.../ (dòng có chữ edit)-->
<!--Các icon được lấy từ https://fontawesome.com/start -->
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Card visit điện tử - /tên của bạn/"><!--edit -->
    <title>
        @if(!empty($name))
            {{$name->info}}
        @endif
    </title><!--edit -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/template2/css/index.css')}}">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="shortcut icon" href="{{asset('icon.png')}}">
    <style>
        #topl img {
            width: 135px;
            height: 135px;
            border-radius: 99px;
            object-fit: cover;
        }
    </style>
    @include('components.onesignal')
</head>
<body>
<div id="topb">
    <div id="top">
        <div id="topl">
            @if(!empty($avatar))
                <img src="{{$avatar->info}}">
            @endif
        </div>
        <div id="topr">
            @if(!empty($name))
                <div style="font-size: 1.5rem; margin-top: 10px" id="td">{{$name->info}}</div><!--edit -->
            @endif
            @if(!empty($about))
                <div style="margin-bottom: 20px; font-size: 14px; margin-top: 5px">{{$about->info}}</div><!--edit -->
            @endif
            <div>
                <form method="get" action="{{asset('/save-contact/'.$userId)}}">
                    <button><b><i class="far fa-address-book"></i> Lưu danh bạ</b></button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="bbb">
    @if(count($contact))
        @foreach($contact as $value)
            @if($value->key == 'mobilephone')
                <a href="tel:{{$value->info}}"><!--edit -->
                    <div id="rowb">
                        <div id="row">
                            <div id="rowl">
                                <img src="{{asset('assets/icon_template2/'.$value->key.'.png')}}">
                            </div>
                            <div id="rowr">
                                <div id="td">Điện thoại</div>
                                <div class="nd">{{$value->info}}</div><!--edit -->
                            </div>
                        </div>
                    </div>
                </a>
            @elseif($value->key === 'email')
                <a href="mailto:{{$value->info}}"><!--edit -->
                    <div id="rowb">
                        <div id="row">
                            <div id="rowl">
                                <img src="{{asset('assets/icon_template2/'.$value->key.'.png')}}">
                            </div>
                            <div id="rowr">
                                <div id="td">Email</div>
                                <div class="nd">{{$value->info}}</div><!--edit -->
                            </div>
                        </div>
                    </div>
                </a>
            @else
                <a href="@if($value->key == 'bank')#@else{{$value->info}}@endif"><!--edit -->
                    <div id="rowb">
                        <div id="row">
                            <div id="rowl">
                                <img src="{{asset('assets/icon_template2/'.$value->key.'.png')}}">
                            </div>
                            <div id="rowr">
                                <div id="td">{{getTextTemplate($value->key, $value->info)}}</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    @endif
</div>

<div id="bot">

</div>
</body>
</html>
