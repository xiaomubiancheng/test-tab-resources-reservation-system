
@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/admin/css/plugins/datapicker/datepicker3.css">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.bill.index')}}"><span style="font-size:16px;">提单列表</span></a>>提单添加:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red">置灰部分不可操作,点击右上角 刷新页面重新操作</span></h5>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form  class="form-horizontal" role="form"  id="form-bill-add" method="post">
                        @csrf
                        <input type="hidden" name="submit_status" id="submit_status" value="1">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">项目名称:</label>
                                <div class="col-sm-8">
                                    <select name="project" id="project" style="width: 100%" class="form-control  " >
                                        <option value=""></option>
                                        @foreach($projects as $id=>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">SKU:</label>
                                <div class="col-sm-8">
                                    <select name="sku" id="sku" style="width: 100%" class="form-control  " >
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">测试类型:</label>
                                <div class="col-sm-8">
                                    <select name="ttype" id="ttype" style="width: 100%" class="form-control" >
                                        <option ></option>
                                        @foreach($ttypes as $id=>$name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">测试内容:</label>
                                <div class="col-sm-8">
                                    <select name="tcontent" id="tcontent" style="width: 100%" class="form-control " >
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">开始时间:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datepicker" id="starttime" autocomplete="off" name="starttime" />
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none" id="endtime_div">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">结束时间:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datepicker" id="endtime" name="endtime" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="auto_workday_div">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">工作周期:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" id="auto_starttime" name="auto_starttime" readonly/>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="" id="auto_endtime" name="auto_endtime" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="overtime_human" style="display:none;">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label"><span style="color:red">加班最多可使用人力:</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="" id="mostManpower" name="mostManpower" readonly/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label"><span style="color: red">加班人力:</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="" id="overManpower" name="overManpower" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="auto_div">
                            <div class="form-group col-sm-6" id="workday_div">
                                <label class="col-sm-4 control-label">工作时长(天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="workday" name="workday" value=""  readonly />
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="display:none;" id="workday_delay_div">
                                <label class="col-sm-4 control-label">工作时长(天):<span style="color:red; " id="delay_">已顺延</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="workday_delay" name="workday_delay" value=""  readonly />
                                </div>
                            </div>
                            <div class="form-group col-sm-6" style="display:none;" id="workday_overtime_div">
                                <label class="col-sm-4 control-label">工作时长(天):<span style="color:red; " id="over_">含加班</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="workday_overtime" name="workday_overtime" value=""  readonly />
                                </div>
                            </div>
                            <div class="form-group col-sm-6" id="man_div" >
                                <label class="col-sm-4 control-label">人力需求(人/天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="manpower" name="manpower" value="" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="custom_div" style="display: none;">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label"><span class="text-danger">*</span>工作时长(天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="" id="custom_workday" name="custom_workday" readonly/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" id="man_div" >
                                <label class="col-sm-4 control-label"><span class="text-danger">*</span>人力需求(人/天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="请输入人力" id="custom_manpower" name="custom_manpower"/>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="content_div" style="display:none;">
                            <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label"><span class="text-danger">*</span>测试内容:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="content" id="" cols="12" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-10 col-sm-10">
                                <button type="button"  class="btn  btn-success" id="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- 已保存列表-->
            <div class="example-wrap " style="margin-top:100px;display: none;" id="preserve_div" >
                <div class="example">
                    <div class="btn-group hidden-xs" id="exampleToolbar" role="group" style="margin-bottom: -60px;" >
                        <a href="javascript:;" >
                            <button type="button" class="btn btn-outline btn-default" >
                                <i class="glyphicon glyphicon-arrow-up" aria-hidden="true"></i>
                                提交
                            </button>
                        </a>
                    </div>
                    <table id="preserve"  >

                    </table>
                </div>
            </div>


            <!--项目费用-->
            <div class="ibox-content" style="margin-top: 20px;">

                <div class="row" id="container" style="width:700px;height:400px;">

                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript" src="{{asset('static')}}/jquery-validate/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/jquery-validate/dist/localization/messages_zh.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/echart5/echarts.min.js"></script>
    <script>
        $('.select2').select2();
        $('.datepicker').datepicker({
            autoclose:true, //当选择一个日期之后是否立即关闭此日期时间选择器
            "format":"yyyy-mm-dd",
            Highlight :true, //高亮显示
        });

        const _token = "{{csrf_token()}}";
        var tcontent = [];   //存放测试内容

        //@1测试类型变动   测试内容改变
        $("#ttype").on('change',function(){
            var ttype_id = $(this).val();
            $.post("{{route('admin.bill.tcontent')}}",{id:ttype_id,_token:_token},function (data) {
                tcontent = data.data;
                var html="<option value=''></option>";
                for(var i=0;i<tcontent.length;i++){
                   html += "<option value='"+tcontent[i].id+"' data-id='"+i+"' data-name='"+tcontent[i].name+"'>"+tcontent[i].name+"</option>";
                }
                $("#tcontent").html(html);
            },'json');
        })

        //@2测试内容选择
        $("#tcontent").on("change",function(){
           var data_name = $(this).find("option:selected").attr("data-name"); //获取自定义属性的值
           var data_id = $(this).find("option:selected").attr("data-id");
           var sku = $("#sku option:selected").val();
           if(data_name =='自定义-线下沟通'){
               $("#auto_workday_div").hide(); //工作周期
               $("#endtime_div").show(); //结束时间
               $("#auto_div").hide();
               $("#custom_div").show();
               $("#content_div").show();
               $("#submit_status").val(4);
           }else{  //自动结算
               var workday = (tcontent[data_id].cyc)*sku;
               $("#workday").val( workday); //工作时长
               $("#manpower").val( (tcontent[data_id].manpower)*sku);  //人力

               $("#auto_workday_div").show(); //工作周期
               $("#endtime_div").hide(); //结束时间
               $("#auto_div").show();
               $("#custom_div").hide();
               $("#content_div").hide();
               $("#submit_status").val(1);
           }
            $("#sku").attr('disabled','disabled');
        });


        var submit_flag = false;
        //@4开时间 确认  非自定义
        $("#starttime").datepicker().on('changeDate',function (e) {

            submit_flag = false;
            $("#workday_delay_div").hide();
            $("#workday_overtime_div").hide();
            $("#overtime_human").hide();     //加班可用人力
            $("#workday_div").show();
            $("#auto_starttime").val("");
            $("#auto_endtime").val("");

            if($(this).val()==''){
                return ;
            }
            starttime = $(this).val();
            var timestamp = Date.parse($(this).val());
            var timestamp_now = Date.parse(new Date());

            //提单时间至少是明天
            if(timestamp<=timestamp_now){
                layer.msg('开始时间不能早于或等于今天',{icon:2});
                $(this).val("");
                return;
            }

            //判断是否为节假日
            if(!IsHoliday($(this).val())){
                $("#starttime").val("");
                return ;
            }

            if($("#submit_status").val() == 4){
                return false;
            }

            if($("#ttype").val()==""){
                layer.msg('请选择测试类型',{icon:2});
                $(this).val("");
                return ;
            }

            if($("#tcontent").val()==""){
                layer.msg('请选择测试内容',{icon:2});
                $(this).val("");
                return ;
            }

            //---------将sku,测试类型,测试内容置灰---------
            $("#sku").attr('disabled','disabled');
            $("#ttype").attr('disabled','disabled'); //测试类型
            $("#tcontent").attr('disabled','disabled');

            let manpower = $("#manpower").val();
            let time = $(this).val();
            let ttid = $("#ttype").val();
            let workday = $("#workday").val();




            //先去判断人力是否充足
            $.post("{{route('admin.bill.humanIsEnough')}}",{_token:_token,time:time,ttid:ttid,workday:workday,manpower:manpower} ).then(({status,msg,data})=>{
                //data

                //人力不足
                if( status==1000 ){
                    layer.confirm(msg,{
                        btn:['顺延时间','加班安排']
                    },()=>{
                        /*1****顺延时间*****/
                        //找下一个时间段
                      $.post("{{route('admin.bill.timedelay')}}",{_token:_token,time:time,ttid:ttid,workday:workday,manpower:manpower,week_count:data[0],manpower_:data[1]}).then(({data,msg,status})=>{
                         if(status==0){
                             submit_flag = true;
                              layer.msg('可以顺延',{icon:1});
                               $("#auto_starttime").val(time);
                               $("#auto_endtime").val(data.time);
                               $("#workday_delay_div").show();
                               $("#workday_div").hide();
                               $("#workday_delay").val(parseInt(workday)+1);
                               $("#submit_status").val(2);
                         }else{
                             $("#starttime").val("");
                             layer.msg(msg,{icon:2});
                         }
                        });

                    },()=>{
                        /******2加班安排*****/

                        $.post("{{route('admin.bill.overtime')}}",{_token:_token,time:time,ttid:ttid,workday:workday,manpower:manpower}).then(({status,msg,data})=>{
                            if(status==0){
                                $("#mostManpower").val(data['mostManpower']);
                                $("#overManpower").val(data['overManpower']);
                                $("#overtime_human").show();

                                //工作时长
                                $("#workday_overtime_div").show();
                                $("#workday_overtime").val(parseInt(workday)+1);
                                $("#workday_delay_div").hide();
                                $("#workday_div").hide();

                                $("#auto_starttime").val(time);
                                $("#auto_endtime").val(data.endTime);
                                $("#submit_status").val(3);
                                submit_flag = true;
                            }else{
                                $("#starttime").val("");
                                layer.msg(msg,{icon:2});
                            }
                        })

                    });

                }else if(status == 1001){
                    layer.msg(msg,{icon:2});
                    $("#starttime").val("");
                }else{  //正常提交

                    $("#auto_starttime").val(time);
                    $("#auto_endtime").val(data);
                    $("#submit_status").val(1);
                    submit_flag = true;
                }
            });

        })


        //结束时间
        $("#endtime").datepicker().on('changeDate',function (e) {
            //判断是否为节假日
            if(!IsHoliday($(this).val())){
                $("#endtime").val("");
                return ;
            }

            if($("#starttime").val()==""){
                layer.msg('请选择开始时间',{icon:2});
                $(this).val("");
                return false;
            }

            if($("#endtime").val() == ''){
                return false;
            }

            $.post("{{route('admin.bill.getcustomtime')}}",{_token:_token,startTime:$("#starttime").val(),endTime:$("#endtime").val()}).then(({status,msg,data})=>{
                if(status == 0){
                    $("#custom_workday").val(data);
                }else{
                    layer.msg(msg,{icon:2});
                    $("#starttime").val("");
                    $("#endtime").val("");
                }
            })
        })




        //***********提交************
        $("#submit").on('click',function(){

            //自定义
            if($("#submit_status").val() == 4){
                let startTime = $("#starttime").val();
                let endTime = $("#endtime").val();
                let workday = $("#custom_workday").val();
                let manpower = $("#custom_manpower").val();
                let content = $("#content").val();
                let ttype = $("#ttype").val();

                if(startTime=="" || endTime=='' || workday == "" || manpower=="" || content == ""){
                    layer.msg('信息填写不完整',{icon:2});
                    return false;
                }

                //验证人力是否够
                $.ajax({
                    url:"{{route('admin.bill.custom')}}",
                    type:"POST",
                    data:  {_token:_token,ttid:ttype,startTime:startTime,endTime:endTime,workday:workday,manpower:manpower},
                    async:false,
                    dataType: "json",
                    success: function(data){
                        if(data.status == 1000){
                            layer.msg(data.msg,{icon:2});
                        }else{
                            submit_flag = true;
                        }
                    },

                });
            }



            if(!submit_flag){
                return false;
            }

            if($("#project").val() == ""){
                layer.msg('请选择项目',{icon:2});
                return false;
            }

            //数据提交
            $.ajax({
                url:"{{route('admin.bill.store')}}",
                type:"POST",
                data:{_token:_token,sku:$("#sku").val(),ttype:$("#ttype").val(),tcontent:$("#tcontent").val(),data:$("#form-bill-add").serialize()},
                dataType:'json',
                async:false,
                success:function(data){
                    if(data.status == 0){
                        layer.msg(data.msg,{icon:1,time:2000});
                        location.reload();
                    }else{
                        layer.msg('msg',{icon:2});
                    }
                },
            });


        });


        //是否是节假日
        function IsHoliday(time){
            var flag = true;
            $.ajax({
                type: "POST",
                url: "{{route('admin.bill.isholiday')}}",
                data:  {_token:_token,time:time},
                async:false,
                dataType: "json",
                success: function(data){
                    if(data.status == 1000){
                        layer.msg(data.msg,{icon:2});
                        flag = false;
                    }
                },
            });
           return flag;
        }
    </script>

    <script>

        var assist_create_status;
        var assist_project_id;
        $.ajax({
            type: "GET",
            url: "{{route('admin.bill.getStatus')}}",
            data:  "",
            async:false,
            dataType: "json",
            success: function(data){

                assist_create_status = data.data.status;
                assist_project_id = data.data.project_id;
            },
        });

        //
        if(assist_create_status == 2 && assist_project_id!=0){
            let project_id = assist_project_id;

            $.post("{{route('admin.bill.preserve')}}",{_token:"{{csrf_token()}}",project_id:project_id},function (data) {

                //有提单
                if(data.data.length){
                    project_id = data.data[0].project_id;

                    //项目选择 ---- 锁死
                    $("#project").val(project_id).attr('disabled','disabled');

                    $("#preserve_div").show();

                    $("#preserve").bootstrapTable({
                        data: data.data,
                        method:"post",
                        showColumns: true,
                        height:400,
                        striped: true,
                        iconSize: 'outline',
                        icons: {
                            columns: 'glyphicon-list'
                        },
                        columns: [
                            {field:'',checkbox:true},
                            {field: 'id',title: '提单ID',class:'td-nowrap',sortable: true},
                            {field: 'name',title: '项目名称',class:'td-nowrap',sortable: true},
                            {field: 'proname',title: '测试类型',class:'td-nowrap',sortable: true},
                            {field: 'manpower',title: '人力',class:'td-nowrap',sortable: true},
                        ],
                    });

                    //3. 项目费用图

                    if(project_id>0){
                        $.get("{{route('admin.bill.costPriview')}}",{_token:"{{csrf_token()}}",project_id:project_id},res =>{
                            res;
                        }).then(({status,data})=>{
                            console.log(data);
                            var last = data.last;
                            var uid_use = data.uid_use;
                            var use = data.use;

                            var dom = document.getElementById("container");
                            var myChart = echarts.init(dom);
                            var app = {};

                            var option;



                            var posList = [
                                'left', 'right', 'top', 'bottom',
                                'inside',
                                'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
                                'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
                            ];

                            app.configParameters = {
                                rotate: {
                                    min: -90,
                                    max: 90
                                },
                                align: {
                                    options: {
                                        left: 'left',
                                        center: 'center',
                                        right: 'right'
                                    }
                                },
                                verticalAlign: {
                                    options: {
                                        top: 'top',
                                        middle: 'middle',
                                        bottom: 'bottom'
                                    }
                                },
                                position: {
                                    options: posList.reduce(function (map, pos) {
                                        map[pos] = pos;
                                        return map;
                                    }, {})
                                },
                                distance: {
                                    min: 0,
                                    max: 100
                                }
                            };

                            app.config = {
                                rotate: 90,
                                align: 'left',
                                verticalAlign: 'middle',
                                position: 'insideBottom',
                                distance: 15,
                                onChange: function () {
                                    var labelOption = {
                                        normal: {
                                            rotate: app.config.rotate,
                                            align: app.config.align,
                                            verticalAlign: app.config.verticalAlign,
                                            position: app.config.position,
                                            distance: app.config.distance
                                        }
                                    };
                                    myChart.setOption({
                                        series: [{
                                            label: labelOption
                                        }, {
                                            label: labelOption
                                        }, {
                                            label: labelOption
                                        }, {
                                            label: labelOption
                                        }]
                                    });
                                }
                            };


                            var labelOption = {
                                show: true,
                                position: app.config.position,
                                distance: app.config.distance,
                                align: app.config.align,
                                verticalAlign: app.config.verticalAlign,
                                rotate: app.config.rotate,
                                formatter: '{c}  {name|{a}}',
                                fontSize: 16,
                                rich: {
                                    name: {
                                    }
                                }
                            };

                            option = {
                                tooltip: {
                                    trigger: 'axis',
                                    axisPointer: {
                                        type: 'shadow'
                                    }
                                },
                                legend: {
                                    data: ['已使用', '剩余', '当前单']
                                },
                                toolbox: {
                                    show: true,
                                    orient: 'vertical',
                                    left: 'right',
                                    top: 'center',
                                    feature: {
                                        mark: {show: true},
                                        dataView: {show: true, readOnly: false},
                                        magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                                        restore: {show: true},
                                        saveAsImage: {show: true}
                                    }
                                },
                                xAxis: [
                                    {
                                        type: 'category',
                                        axisTick: {show: false},
                                        data: ['项目费用']
                                    }
                                ],
                                yAxis: [
                                    {
                                        type: 'value'
                                    }
                                ],
                                series: [
                                    {
                                        name: '已使用',
                                        type: 'bar',
                                        barGap: 0,
                                        label: labelOption,
                                        emphasis: {
                                            focus: 'series'
                                        },
                                        data: [use]
                                    },
                                    {
                                        name: '剩余',
                                        type: 'bar',
                                        label: labelOption,
                                        emphasis: {
                                            focus: 'series'
                                        },
                                        data: [last]
                                    },
                                    {
                                        name: '当前单',
                                        type: 'bar',
                                        label: labelOption,
                                        emphasis: {
                                            focus: 'series'
                                        },
                                        data: [uid_use]
                                    },
                                ]
                            };

                            if (option && typeof option === 'object') {
                                myChart.setOption(option);
                            }
                        });
                    }


                }
            },'json');


        } //end_if_2



        //提交
        $("#exampleToolbar").on('click',function(){
            batch();
        })


        function batch(){
            if(check() == 0){
                alert('至少选中一条信息!');
                return false;
            }

            doBatch(0);
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
            console.log(getSelectRows());
            var preserveBatch = "{{route('admin.bill.preserveBatch')}}";
            $.ajax({
                type: "POST",
                url:preserveBatch,
                async: false,
                cache: false,
                dataType: "json",
                data: {_token:"{{csrf_token()}}",id_arr:getSelectRows()},
                success: function (data) {
                    if(data.code == 200){
                        location.href="{{route('admin.bill.index')}}";
                    }
                },
            });

        }


        //获取被选中行的runid
        function getSelectRows(){
            var runid_arr=[];
            //获取所有信息的
            var getSelectRows =$("#preserve").bootstrapTable('getSelections',function(row){
                return row;
            })
            //流实例id
            for(var i=0,len=getSelectRows.length;i<len;i++){
                runid_arr.push(getSelectRows[i].id);
            }
            return runid_arr;
        }

    </script>

@endsection
