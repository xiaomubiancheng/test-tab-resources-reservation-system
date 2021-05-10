@extends('admin.layout.ucommon')


@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-content">
            <div class="row col-sm-12">
                <div class="form-group col-sm-6 ">
                    <label>分组:</label>
{{--                    <input type="text" class="form-control" value="" name="" readonly>--}}
                    <select class="form-control select2" name="ttype" id="ttype">
                        <option value=""></option>
                        @foreach($departments as $k=>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6 ">
                    <label>提单人:</label>
                    <input type="text" class="form-control" value="{{$username}}" name="" readonly>
                </div>
            </div>
            <div>
                <div class="form-group col-sm-6">
                    <label>项目名称:</label>
                    <select  class="form-control select2" style="width:97.5%" name="project" id="project" >
                        <option value=""></option>
                        @foreach($projects as $k=>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6" style="margin-top:23px;">
                    <div >
                        <button type="submit" class="btn  btn-success" id="search">查询</button>
                    </div>
                </div>
            </div>

            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Toolbar -->
                    <div class="example-wrap">
                        <div class="example">
                            <table id="bill" data-toggle="table" data-height="700"   >
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>提单测试项</th>--}}
{{--                                    <th>提单人</th>--}}
{{--                                    <th>项目</th>--}}
{{--                                    <th>提单ID</th>--}}
{{--                                    <th>提单人力</th>--}}
{{--                                    <th>结算人力</th>--}}
{{--                                    <th>操作</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($bills as $bill)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$bill->ptname}}</td>--}}
{{--                                    <td>{{$bill->uname}}</td>--}}
{{--                                    <td>{{$bill->pname}}</td>--}}
{{--                                    <td>{{$bill->id}}</td>--}}
{{--                                    <td>{{$bill->manpower}}</td>--}}
{{--                                    <td>--}}
{{--                                        @if($bill->settle_manpower == 0)--}}
{{--                                            未结算--}}
{{--                                        @else {{$bill->settle_manpower}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="" class="label label-success">修改</a>--}}
{{--                                        <a href="javascript:;" onclick='func("{{route('admin.bill.settledo',['id'=>$bill->id])}}")'  class="label label-success ddd">结算</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
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

        //下拉效果
        $(".select2").select2();

        let data = getData();

        $("#bill").bootstrapTable({
            data:data,
            method:"post",
            search: true,
            showColumns: true,
            striped: true,
            iconSize: 'outline',
            toolbar: '#systemToolbar',
            showExport: true,                //是否显示导出
            exportDataType: 'all',            //导出方式
            exportTypes:[ 'xlsx', 'excel'],  //导出文件类型
            exportOptions: {                 //导出文件名称
                fileName:"提单列表"
            },
            columns:[
                {field: 'ptname',title: '提单测试项',class:'td-nowrap',sortable: true},
                {field: 'uname',title: '提单人',class:'td-nowrap',sortable: true},
                {field: 'pname',title: '项目',class:'td-nowrap',sortable: true},
                {field: 'id',title: '提单ID',class:'td-nowrap',sortable: true},
                {field: 'manpower',title: '预算人力',class:'td-nowrap',sortable: true},
                {field: 'settle_manpower',title: '结算人力',class:'td-nowrap',sortable: true,formatter:function(value,row,index){
                        if(value == 0){
                            return "<span style='color:red'>未结算</span>";
                        }else{
                            return "<span style='color:blue'>"+value+"</span>";
                        }
                    }
                },
                {
                    filed:'id',
                    title: '操作',class:'td-nowrap',
                    formatter:function (value,row,index) {
                        if(row.settle_manpower != ""){
                            return "<span style='color:red'>已结算</span>";
                        }
                        var actions =[];
                        var str = `<a href='javascript:;' onclick='func("{{route('admin.bill.settledo')}}?id=${row.id}")'  class='label label-success ddd'>结算</a>`
                        actions.push(str);
                        return actions.join('');
                    }
                }
            ]
        })


        //结算
        function func(url){
            layer.prompt({title: '请填写结算人力',},function(value, index, elem){
                if(value == " "){
                    layer.msg('输入不正确',{icon:2});
                }
                const _token = "{{csrf_token()}}";
                $.ajax({
                    url,
                    data:{_token,settleManpower:value},
                    type:"GET",
                    dataType:'json'
                }).then(({status,msg})=>{
                    if(status == 0){
                        layer.msg(msg,{icon:1,time:1000},()=>{
                            window.location.reload();
                        })
                    }
                });
                layer.close(index);
            });
        }

        function getData(){
            var ttype = $("#ttype").val();
            var project = $("#project").val();
            let res = [];

            $.ajaxSetup({async: false});
            $.post("{{route('admin.bill.settlesearch')}}",{_token:"{{csrf_token()}}",ttype:ttype,project:project},function(data){
                res = data.data;
            },'json');
            return res;
        }


        //查询
        $("#search").click(function(){
            var ttype = $("#ttype").val();
            var project = $("#project").val();
            if(ttype == '' && project == ''){
                layer.msg('查询条件不能同时为空',{icon:2,time:1000});
                return false;
            }

            $.post("{{route('admin.bill.settlesearch')}}",{_token:"{{csrf_token()}}",ttype:ttype,project:project},function(data){
                // console.log(data);
                $('#bill').bootstrapTable('load',data.data);
            },'json');

        });



    </script>
@endsection




