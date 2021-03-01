@extends('admin.layout.ucommon')


@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Toolbar -->
                    <div class="example-wrap">
                        <div class="example">
                            <div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                <a href="{{route('admin.project.create')}}" >
                                    <button type="button" class="btn btn-outline btn-default">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        新建项目
                                    </button>
                                </a>
                            </div>
                            <table id="exampleTableToolbar" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" style="word-break:break-all;" >
                                <thead>
                                <tr>
                                    <th>项目名称(Project Name)</th>
                                    <th>产品名称(Product Name)</th>
                                    <th>市场名称(Marketing Name)</th>
                                    <th>VPM</th>
                                    <th>Development(before SS)启动时间</th>
                                    <th>OS upgrade 启动时间</th>
                                    <th>OTA(12) 启动时间</th>
                                    <th>研发中心(Engineering Team)</th>
                                    <th>形态(Format)</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $list)
                                <tr>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->pdname}}</td>
                                    <td>{{$list->mname}}</td>
                                    <td>{{$list->vpmname}}</td>
                                    <td>{{$list->devtime}}</td>
                                    <td>{{$list->ostime}}</td>
                                    <td>{{$list->otatime}}</td>
                                    <td>{{$list->engteam}}</td>
                                    <td>{{$list->format}}</td>
                                    <td>
                                        <a href="{{route('admin.project.edit',$list->id)}}" class="label label-success edit">编辑</a>
                                        <a href="{{route('admin.project.show',$list->id)}}" class="label label-success">查看提单</a>
                                        <a href="{{route('admin.project.destroy',$list->id)}}" class="label label-danger radius del">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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




