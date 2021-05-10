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
                                <a href="{{route('admin.role.create')}}">
                                    <button type="button" class="btn btn-outline btn-default">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        添加角色
                                    </button>
                                </a>
                            </div>
                            <table id="role" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>角色名称</th>
                                    <th><span style="color:red">查看权限</span></th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $list)
                                    <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->name}}</td>
                                        <td><a href="{{route('admin.role.node',$list->id)}}" class="label label-primary radius">权限</a></td>
                                        <td>{{$list->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            <a href="{{route('admin.role.edit',$list->id)}}" class="label label-success">修改</a>
                                            @if($list->deleted_at==null )
                                            <a href="{{route('admin.role.destroy',$list->id)}}" class="label label-danger radius del">删除</a>
                                            @else
                                            <a href="{{route('admin.role.restore',$list->id)}}" class="label label-warning radius">还原</a>
                                            @endif
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
        $("#role").bootstrapTable({
            search: true,
            showColumns: true,
            striped: true,
            iconSize: 'outline',
            toolbar: '#systemToolbar',
            showExport: true,                //是否显示导出
            exportDataType: 'all',            //导出方式
            exportTypes:[ 'xlsx', 'excel'],  //导出文件类型
            exportOptions: {                 //导出文件名称
                fileName:"角色列表"
            },
        });

        const _token = "{{csrf_token()}}";

        $("#role").on('click','.del',function(){
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
                return;
            });
            return false;
        })


    </script>
@endsection




