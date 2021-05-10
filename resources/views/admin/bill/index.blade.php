
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
{{--                                    <a href="javascript:;" onclick="sub_">--}}
{{--                                        <button type="button" class="btn btn-outline btn-default" >--}}
{{--                                            <i class="glyphicon glyphicon-arrow-up" aria-hidden="true"></i>--}}
{{--                                            提交--}}
{{--                                        </button>--}}
{{--                                    </a>--}}
                                    <a href="{{route('admin.bill.create')}}" >
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                            新建提单
                                        </button>
                                    </a>
                                </div>
                                <table id="unsub_table" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                    <thead>
                                    <tr>
{{--                                        <th><input type="checkbox" name="ids[]" ></th>--}}
                                        <th>项目名称</th>
                                        <th>提单ID</th>
                                        <th>测试类型</th>
                                        <th>提单总人力(人/天)</th>
                                        <th>测试周期</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                    <tr>
{{--                                        <td><input type="checkbox"></td>--}}
                                        <td>{{$bill->name}}</td>
                                        <td>{{$bill->id}}</td>
                                        <td>{{$bill->proname}}</td>
                                        <td>{{$bill->manpower}}</td>
                                        <td>{{$bill->startTime}}至{{$bill->endTime}}</td>
                                        <td>
{{--                                            <a href="" class="label label-success edit">编辑</a>--}}
                                            <a href="{{route("admin.bill.del",['id'=>$bill->id])}}" class="label label-danger del">删除</a>

                                            <a href="{{route("admin.bill.changeStatus",['id'=>$bill->id])}}" class="label label-primary">提交</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">

                        <div class="example-wrap">
                            <div class="example">
                                <div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                    <a href="{{route('admin.bill.create')}}" >
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                            新建提单
                                        </button>
                                    </a>
                                </div>
                                <table data-toggle="table" data-height="500"  data-search="true" data-pagination="true" >
                                    <thead>
                                    <tr>
                                        <th>项目名称</th>
                                        <th>提单ID</th>
                                        <th>测试类型</th>
                                        <th>提单总人力(人/天)</th>
                                        <th>测试周期</th>
{{--                                        <th width="10%">操作</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($billsO as $bill)
                                        <tr>
                                            <td>{{$bill->name}}</td>
                                            <td>{{$bill->id}}</td>
                                            <td>{{$bill->proname}}</td>
                                            <td>{{$bill->manpower}}</td>
                                            <td>{{$bill->startTime}}至{{$bill->endTime}}</td>
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
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('static')}}/layer/layer.js"></script>
    <script>

        const _token = "{{csrf_token()}}";


        //提单-已保存-删除
        $("#unsub_table").on('click','.del',function(){
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


        function sub_() {
            if(check()==0){
                layer.msg('至少选中一条信息',{icon:2});
                return false;
            }
        }

        function check(){
            var count =0;
            //判断是否有信息被选中
            $("input[name='btSelectItem']").each(function(){
                if($(this).is(":checked")){
                    count++;
                }
            })
            return count;
        }

        function doBatch(result){
            var VocationApprove = "{=:url('Work/VocationApprove')=}";
            $.ajax({
                type: "POST",
                url:VocationApprove,
                async: false,
                cache: false,
                dataType: "json",
                data: {runid_arr:getSelectRows(),result:result},
                success: function (data) {
                    if(data.code == 200){
                        alert("成功!");
                        location.reload();
                    }
                },
            });
        }

        //获取被选中行的runid
        function getSelectRows(){
            var runid_arr=[];
            //获取所有信息的
            var getSelectRows =$("#leave_application_list").bootstrapTable('getSelections',function(row){
                return row;
            })
            //流实例id
            for(var i=0,len=getSelectRows.length;i<len;i++){
                // runid_arr.push(getSelectRows[i].runid);
                runid_arr.push(getSelectRows[i]);
            }
            return runid_arr;
        }
    </script>
@endsection




