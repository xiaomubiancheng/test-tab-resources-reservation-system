
@extends('admin.layout.ucommon')


@section('content')
<div class="wrapper wrapper-content animated fadeIn">
<div class="row">
    <div class="col-sm-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">已保存</a>
                </li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">已提交</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">

                        <div class="example-wrap">
                            <div class="example">
                                <div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                    <a href="{{route('admin.bill.settle')}}" >
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-arrow-up" aria-hidden="true"></i>
                                            提交
                                        </button>
                                    </a>
                                    <a href="{{route('admin.bill.create')}}" >
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                            新建提单
                                        </button>
                                    </a>
                                </div>
                                <table id="exampleTableToolbar" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                    <thead>
                                    <tr>
                                        <th>项目名称</th>
                                        <th>提单编号</th>
                                        <th>测试类型</th>
                                        <th>提单总人力(人/天)</th>
                                        <th>测试周期</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="label label-success edit">编辑</a>
                                            <a href="" class="label label-danger">删除</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <strong>移动设备优先</strong>
                        <p>在 Bootstrap 2 中，我们对框架中的某些关键部分增加了对移动设备友好的样式。而在 Bootstrap 3 中，我们重写了整个框架，使其一开始就是对移动设备友好的。这次不是简单的增加一些可选的针对移动设备的样式，而是直接融合进了框架的内核中。也就是说，Bootstrap 是移动设备优先的。针对移动设备的样式融合进了框架的每个角落，而不是增加一个额外的文件。</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('static')}}/layer/layer.js"></script>
    <script>
        $("#exampleTableToolbar").bootstrapTable({
            search: true,
            showColumns: true,
            striped: true,
            iconSize: 'outline',
            toolbar: '#systemToolbar',
            showExport: true,                //是否显示导出
            exportDataType: 'all',            //导出方式
            exportTypes:[ 'xlsx', 'excel'],  //导出文件类型
            exportOptions: {                 //导出文件名称
                fileName:"项目列表"
            },
        });

        const _token = "{{csrf_token()}}";

        //删除
        $('.del').click(function (evt) {
            let url = $(this).attr('href');
            var that = $(this);
            layer.confirm('你确定要删除嘛', {
                btn: ['确定','取消'] //按钮
            }, function(evt){
                $.ajax({
                    url,
                    data:{_token},
                    type:"DELETE",
                    dataType:'json'
                }).then(({status,msg})=>{
                    if(status ==0){
                        layer.msg(msg,{time:2000,icon:1},()=>{
                            that.parents('tr').remove();
                        });
                    }
                });
            }, function(){
                return;s
            });




            return false;
        })
    </script>
@endsection




