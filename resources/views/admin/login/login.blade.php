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

        <div style="width:310px;">
            <form class="m-t" role="form" action="{{url('admin/login')}}" method="post">
                @csrf
                <input type="hidden" name="itcode_status" id="itcode_status" value="1">
                <div id="itcode">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="ITcode"  name="itcode" >
                    </div>
                    <div >
                        <input type="text" name="captcha" class="form-control" style="height:46px;" placeholder="验证码" style="float: left;">
                        <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src() }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码" style="float:right;margin-top:-46px;">
                    </div>
                </div>
                <div style="display: none;" id="common">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="用户名"  name="username" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="密码"  name="password">
                    </div>
                </div>

                <div style="align-content: center;height:30px;margin-top: 5px;" id="sta1">
                    <span style="float:left"><a href="javascript:;" id="change1">>>>账号密码登录</a></span>
                </div>
                <div style="align-content: center;height:30px;margin-top: 5px;display:none;" id="sta2">
                    <span style="float:left"><a href="javascript:;" id="change2">>>>Itcode登录</a></span>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

                </p>
            </form>
        </div>

    </div>
</div>
<script src="{{asset('static')}}/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="{{asset('static')}}/admin/js/bootstrap.min.js?v=3.3.6"></script>
@include("admin.layout.validate")

<script>
    $("#change1").on('click',function(){
        $("#itcode").hide();
        $("#common").show();
        $("#sta1").hide();
        $("#sta2").show();
        $("#itcode_status").val(0);
    });
    $("#change2").on('click',function(){
        $("#itcode").show();
        $("#common").hide();
        $("#sta1").show();
        $("#sta2").hide();
        $("#itcode_status").val(1);
    });
</script>
</body>
</html>
