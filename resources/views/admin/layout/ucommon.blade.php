<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('static')}}/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/animate.min.css" rel="stylesheet">
    <link href="{{asset('static')}}/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static')}}/select2/select2.css">
    @yield('css')
</head>
<body class="gray-bg">
@yield('content')
<script src="{{asset('static')}}/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="{{asset('static')}}/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="{{asset('static')}}/admin/js/content.min.js?v=1.0.0"></script>
<script src="{{asset('static')}}/admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script type="text/javascript" src="{{asset('static')}}/select2/select2.js"></script>
<script src="{{asset('static')}}/layer/layer.js"></script>
@yield('js')
@include('admin.layout.msg')
@include('admin.layout.validate')
</body>
</html>

