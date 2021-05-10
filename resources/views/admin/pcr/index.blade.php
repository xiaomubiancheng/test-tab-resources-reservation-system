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
                                <a href="{{route('admin.pcr.create')}}" >
                                    <button type="button" class="btn btn-outline btn-default">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        新增PCR
                                    </button>
                                </a>
                            </div>
                            <table id="exampleTableToolbar" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                <thead>
                                <tr>
                                    <th>项目名称</th>
                                    <th>PCR编号(项目_项目ID_PCR ID)</th>
                                    <th>PCR需求</th>
                                    <th>费用</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pcrs as $pcr)
                                <tr>
                                    <td>{{$pcr->project_name}}</td>
                                    <td>{{$pcr->project_name}}_{{$pcr->project_id}}_{{$pcr->id}}</td>
                                    <td>{{$pcr->content}}</td>
                                    <td>{{$pcr->cost}}</td>
                                    <td>
                                        <a href="javascript:;" class="label label-success" onclick="show('{{$pcr->img}}')">查看证据</a>
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


        //查看图片
        function show(path) {
            photo = {
                "title" : "pcr",
                "data":[
                    {
                        "src": path,
                    }
                ]
            }
            layer.photos({
                photos: photo //格式见API文档手册页
                ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机
            });
        }
    </script>
@endsection




