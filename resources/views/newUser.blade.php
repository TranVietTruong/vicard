<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{asset('')}}">
    <meta id="token" name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>smartcard.me - Bạn chưa thêm thông tin</title>
    <style>
        div#app {
            text-align: center;
            margin-top: 100px;
        }

        div#app a {
            padding: 10px 20px;
            border: 1px solid black;
            /* margin-top: 88px; */
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <h2>Bạn chưa thiếp lập thông tin, Vui lòng thiết lập thông tin tại đây</h2>
        <a href="/">Thiết lập thông tin</a>
    </div>
</body>
</html>
