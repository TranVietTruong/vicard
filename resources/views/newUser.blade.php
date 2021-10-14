<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{asset('')}}">
    <meta id="token" name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vicard.vn - Bạn chưa thêm thông tin</title>
    <style>
        div#app {
            text-align: center;
            margin-top: 100px;
        }

        div#app a {
            display: inline-block;
            height: 38px;
            padding: 0 30px;
            color: #fff;
            text-align: center;
            font-size: 11px;
            font-weight: 600;
            line-height: 38px;
            letter-spacing: .1rem;
            text-transform: uppercase;
            text-decoration: none;
            white-space: nowrap;
            background-color: #409EFF;
            border-radius: 4px;
            border: 1px solid #409EFF;
            cursor: pointer;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="font-family: nunito,sans-serif;">
    <div id="app">
        <h2>Bạn chưa thiếp lập thông tin, Vui lòng thiết lập thông tin tại đây</h2>
        <a href="/">Thiết lập thông tin</a>
    </div>
</body>
</html>
