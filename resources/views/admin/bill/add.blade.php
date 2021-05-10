
@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/admin/css/plugins/datapicker/datepicker3.css">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.bill.index')}}">提单列表</a>>提单添加:</h5>
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
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript" src="{{asset('static')}}/jquery-validate/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/jquery-validate/dist/localization/messages_zh.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $('.select2').select2();
        $('.datepicker').datepicker({
            autoclose:true, //当选择一个日期之后是否立即关闭此日期时间选择器
            "format":"yyyy-mm-dd",
            Highlight :true, //高亮显示
        });
        // .datepicker("setDate",'now');

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

                //人力不足
                if(status==1000){
                    // layer.msg("人力不足",{icon:2});
                    layer.confirm(msg,{
                        btn:['顺延时间','加班安排']
                    },()=>{
                        // layer.msg("顺延时间");

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
                        // layer.msg("加班安排");

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

            console.log(submit_flag);

            if(!submit_flag){
                return false;
            }

            if($("#project").val() == ""){
                layer.msg('请选择项目',{icon:2});
                return false;
            }

            $.ajax({
                url:"{{route('admin.bill.store')}}",
                type:"POST",
                data:{_token:_token,sku:$("#sku").val(),ttype:$("#ttype").val(),tcontent:$("#tcontent").val(),data:$("#form-bill-add").serialize()},
                dataType:'json',
                async:false,
                success:function(data){
                    if(data.status == 0){
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
@endsection
