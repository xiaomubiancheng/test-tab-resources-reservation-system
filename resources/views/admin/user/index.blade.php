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
                                <a href="{{route('admin.user.create')}}" >
                                    <button type="button" class="btn btn-outline btn-default">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        添加用户
                                    </button>
                                </a>
{{--                                {!! $model->addShowBtn('admin.user.create') !!}--}}
                            </div>
                            <table id="user" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>姓名</th>
                                    <th>邮箱</th>
                                    <th>加入时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $list)
                                    <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->truename}}</td>
                                        <td>{{$list->email}}</td>
                                        <td>{{$list->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            @if($list->deleted_at == "")
                                                <a href="javascript:;" class="label label-success">已启用</a>
                                            @else
                                                <a href="javascript:;" class="label label-danger">已停用</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.user.edit',['id'=>$list->id])}}" class="label label-success">修改</a>
                                            <a href="{{route('admin.user.role',$list->id)}}" class="label label-primary">分配角色</a>
{{--                                            {!! $list->assignRoleBtn('admin.user.role',$list->id) !!}--}}
                                            @if(auth()->id()!=$list->id)
                                            <a href="{{route('admin.user.del',['id'=>$list->id])}}" class="label label-danger radius delb">删除</a>
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

        $("#user").on('click','.delb',function(){
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
        });

        //删除  除了首页 ，后面所有 无法触发事件 加载问题
        // $('.delb').click(function (evt) {
        //     let url = $(this).attr('href');
        //     var that = $(this);
        //     layer.confirm('你确定要删除嘛', {
        //         btn: ['确定','取消'] //按钮
        //     }, function(evt){
        //         $.ajax({
        //             url,
        //             data:{_token},
        //             type:"DELETE",
        //             dataType:'json'
        //         }).then(({status,msg})=>{
        //             if(status ==0){
        //                 layer.msg(msg,{time:2000,icon:1},()=>{
        //                     that.parents('tr').remove();
        //                 });
        //             }
        //         });
        //     }, function(){
        //         return;
        //     });
        //     return false;
        // })


    </script>
@endsection




