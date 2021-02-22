<!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:16:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>主页</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('static')}}/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/animate.min.css" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    @include('admin.layout.left')
    <!--左侧导航结束-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!--nav-->
    @include('admin.layout.nav')
        <!--nav-->

        @yield('content')

        <!--footer-->
    @include('admin.layout.footer')
        <!--footer-->
    </div>

</div>

<script src="{{asset('static')}}/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="{{asset('static')}}/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="{{asset('static')}}/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{asset('static')}}/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{asset('static')}}/admin/js/plugins/layer/layer.min.js"></script>
<script src="{{asset('static')}}/admin/js/hplus.min.js?v=4.1.0"></script>
<script type="text/javascript" src="{{asset('static')}}/admin/js/contabs.min.js"></script>
<script src="{{asset('static')}}/admin/js/plugins/pace/pace.min.js"></script>
<script>
    //刷新当前tab
    $('.Refresh_tab').on('click', function(){
        let t = setTimeout(function(){$('iframe:visible').attr('src', $('iframe:visible').attr('src'));clearTimeout(t)},100);
    });
</script>
</body>
</html>
