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
                                <a href="{{route('admin.node.create')}}">
                                    <button type="button" class="btn btn-outline btn-default">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        添加节点
                                    </button>
                                </a>
                            </div>
                            <table id="exampleTableToolbar" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>节点名称</th>
                                    <th>路由别名</th>
                                    <th>是否是菜单</th>
                                    <th>加入时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $list)
                                    <tr>
                                        <td>{{$list['id']}}</td>
                                        <td>{{$list['html']}}{{$list['name']}}</td>
                                        <td>{{$list['route_name']}}</td>
                                        <td>
                                            @if($list['is_menu'])
                                                <span class="label label-danger radius">是</span>
                                            @else
                                                <span class="label label-primary radius">否</span>
                                            @endif
                                        </td>
                                        <td>{{$list['created_at']}}</td>
                                        <td>
                                            <a href="{{route('admin.node.edit',$list['id'])}}" class="label label-success">修改</a>
                                            @if(auth()->id()!=$list['id'])
                                            <a href="{{route('admin.node.destroy',$list['id'])}}" class="label label-danger radius del">删除</a>
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
                fileName:"人员列表"
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




