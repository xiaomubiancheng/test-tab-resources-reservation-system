<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('static')}}/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/animate.min.css" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>
<body class="gray-bg" >
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">L</h1>
        </div>
        <h3>欢迎使用 Test-Tab</h3>
        <form class="m-t" role="form" action="{{url('admin/login')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="用户名"  name="username" >
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码"  name="password">
            </div>
{{--            <div class="form-group" style="height:30px;line-height:30px;float:left;">--}}
{{--                <input type="checkbox" name="online" id="online" value="1">&nbsp;--}}
{{--                <span style="line-height: 30px;">记住我</span>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

            </p>
        </form>
    </div>
</div>
<script src="{{asset('static')}}/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="{{asset('static')}}/admin/js/bootstrap.min.js?v=3.3.6"></script>
@include("admin.layout.validate")
</body>
</html>
