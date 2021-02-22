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
    <link href="admin_static/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="admin_static/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="admin_static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="admin_static/css/animate.min.css" rel="stylesheet">
    <link href="admin_static/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>基本面板 <small class="m-l-sm">这是一个自定义面板</small></h5>
                    </div>

                    <div class="ibox-content">
                        <div class="row row-lg">
                            <div class="col-sm-12">
                                <div class="example">
                                    <table id="lst_table" data-toggle="table" data-height="250" data-mobile-responsive="false">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="admin_static/js/jquery.min.js?v=2.1.4"></script>
<script src="admin_static/js/bootstrap.min.js?v=3.3.6"></script>
<script src="admin_static/js/content.min.js?v=1.0.0"></script>
<script src="admin_static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="admin_static/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="admin_static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="admin_static/js/demo/bootstrap-table-demo.min.js"></script>
<script>
    let list = {{$lists}};

    $("#lst_table").bootstrapTable({
        data: list ,
        method:"post",
        search: true,
        showColumns: true,
        height:600,
        striped: true,
        iconSize: 'outline',
        pagination: true,
        pageSize:50,
        icons: {
            columns: 'glyphicon-list'
        },
        toolbar: '#systemToolbar',
        showExport: true,                //是否显示导出
        exportDataType: 'all',            //导出方式
        exportTypes:[ 'xlsx', 'excel'],  //导出文件类型
        exportOptions: {                 //导出文件名称
            fileName:"人员列表"
        },
        columns: [
            {field: 'id',title: '#',class:'td-nowrap',sortable: true,switchable:false},
            {field: 'username',title: '姓名',class:'td-nowrap',sortable: true,switchable:false},
        ]
    });
</script>
</body>
</html>
