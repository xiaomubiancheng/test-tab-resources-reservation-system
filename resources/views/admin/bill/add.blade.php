
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
                    <form action="{{route('admin.bill.store')}}"  class="form-horizontal" role="form"  id="form-user-add" method="post">
                        @csrf
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
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">测试内容:</label>
                                <div class="col-sm-8">
                                    <select name="tcontent" id="tcontent" style="width: 100%" class="form-control " >
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
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
                                <label class="col-sm-4 control-label">开始时间:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datepicker" id="starttime" name="starttime" />
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
                        <div class="row" style="display: none" id="endtime_div">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">结束时间:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datepicker" id="endtime" name="endtime" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="auto_div">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label">工作时长(天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="workday" name="workday" value="" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6" id="man_div" >
                                <label class="col-sm-4 control-label">人力需求(人/天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="manpower" name="manpower" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="custom_div" style="display: none;">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label"><span class="text-danger">*</span>工作时长(天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="" id="custom_workday" name="custom_workday"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" id="man_div" >
                                <label class="col-sm-4 control-label"><span class="text-danger">*</span>人力需求(人/天):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="请输入人力" id="custom_manpower" name="custom_manpower"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-10 col-sm-10">
                                <button type="submit" class="btn  btn-success">提交</button>
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
        }).datepicker("setDate",'now');

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

           var sku = $("#sku").val();
           var starttime = $("#starttime").val();

           if(data_name =='自定义-线下沟通'){
               $("#auto_workday_div").hide(); //工作周期
               $("#endtime_div").show(); //结束时间
               $("#auto_div").hide();
               $("#custom_div").show();


           }else{  //自动结算
               var workday = (tcontent[data_id].cyc)*sku;
               $("#workday").val( workday);
               $("#manpower").val( (tcontent[data_id].manpower)*sku);
               if(starttime == ''){
                   return;
               }else{
                   $("#auto_starttime").val(starttime);
                   //推算时间
                   $.post("{{route('admin.bill.gettime')}}",{starttime:starttime,_token:_token,workday:workday}).then(({status,data})=>{
                        $("#auto_endtime").val(data)
                   });
               }
           }
        });

        //@3sku改变
        $("#sku").on('change',function () {

        });


        //@4开始事件确认
        $("#starttime").datepicker().on('changeDate',function (e) {
            //是否为节假日
             if(!IsHoliday($(this).val())){
                 return ;
             }

            if ( $("#tcontent option:selected").val()=='' || $("#ttype option:selected").val()==''){
                layer.msg('测试类型和测试内容没有选择',{icon:2});
                return;
            }
            //显示

        })


        //结束事件
        $("#endtime").datepicker().on('changeDate',function (e) {

        })


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




        $("#form-bill-add").validate({
            rules:{
                username:{
                    required:true,
                },
                truename:{
                    required:true,
                },
                email:{
                    required:true,
                    email:true,
                }
            },
            messages:{
                username:{
                    required:'账号必须填写'
                },
                truename:{
                    required:'真实姓名必须要写'
                },
                email:{
                    required:'邮箱必须填写',
                    email:'请输入正确格式的邮箱',
                }
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){
                form.submit();
            }
        })
    </script>
@endsection
