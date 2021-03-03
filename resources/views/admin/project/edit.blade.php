@extends('admin.layout.ucommon')

@section('content')
    <div class="wrapper wrapper-content animated fadeIn" >
        <div class="ibox-title">
            <h5><a href="{{route('admin.project.index')}}">项目列表</a>>项目修改:</h5>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <fieldset>
                        <legend>项目信息</legend>
                        <form action="{{route('admin.project.update',$data)}}"  class="form-horizontal" role="form"  id="form-pro-edit" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>项目名称(Project Name):</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>产品名称(Product Name):</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="pdname"  name="pdname" value="{{$data->pdname}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>市场名称(Marketing Name):</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="mname" name="mname" value="{{$data->mname}}"/>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>VPM:</label>
                                    <div class="col-sm-8">
                                        <select name="vpm" id="vpm" style="width: 100%" class="form-control select2" >
                                            <option ></option>
                                            @foreach($vpms as $vpm)
                                                @if($vpm['id'] ==  $data->vpm)
                                                <option value="{{$vpm['id']}}" selected>{{$vpm['name']}}</option>
                                                @else
                                                <option value="{{$vpm['id']}}">{{$vpm['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>Development(before SS)启动时间:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datepicker" id="devtime" name="devtime" value="{{$data->devtime}}" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>OS upgrade 启动时间:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datepicker" id="ostime" name="ostime" value="{{$data->ostime}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>OTA(12)启动时间:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datepicker" id="otatime" name="otatime" value="{{$data->otatime}}" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>研发中心(Engineering Team):</label>
                                    <div class="col-sm-8">
                                        <select name="engteam" id="engteam" style="width: 100%" class="form-control select2" >
                                            <option value=""></option>
                                            <option value="1">In House</option>
                                            <option value="2">JDM</option>
                                            <option value="3">ODM</option>
                                            <option value="4">Design House</option>
                                            <option value="5">Commercial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 control-label"><span class="text-danger">*</span>形态(Format):</label>
                                    <div class="col-sm-8">
                                        <select name="format" id="format" style="width: 100%" class="form-control select2">
                                            <option value=""></option>
                                            <option value="1">Tablet</option>
                                            <option value="2">Smart Home</option>
                                            <option value="3">AR/VR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="row col-sm-12">
                                <div style="margin-left:10px;">
                                    <h2>项目预算</h2>
                                </div>
                            </div>
                            <div class="row col-sm-8" >
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="20%">项目阶段</th>
                                        <th>预算费用</th>
                                        <th>结算费用</th>
                                        <th>启动时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Development(before SS)</td>
                                        <td>
                                            <input type="number" min="0" class="form-control" value="{{$data->dev_budget}}" readonly>
                                        </td>
                                        <td><input type="text" class="form-control" id="dev_settle" ></td>
                                        <td><input type="text" class="form-control" value="{{$data->devtime}}" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>OS upgrade</td>
                                        <td><input type="number" min="0" class="form-control" value="{{$data->os_budget}}" readonly></td>
                                        <td><input type="text" class="form-control" id="os_settle" ></td>
                                        <td><input type="text" class="form-control" value="{{$data->ostime}}" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>OTA(12)</td>
                                        <td><input type="number" min="0" class="form-control" value="{{$data->ota_budget}}" readonly ></td>
                                        <td><input type="text" class="form-control" id="ota_settle" ></td>
                                        <td><input type="text" class="form-control" value="{{$data->otatime}}" readonly></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn  btn-success">提交</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
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
        $(".select2").select2();

        $('.datepicker').datepicker({
            autoclose:true, //当选择一个日期之后是否立即关闭此日期时间选择器
            "format":"yyyy-mm-dd",
            Highlight :true, //高亮显示
        });


        var data = <?echo json_encode($data);?>



        $("#engteam").val(data.engteam).select2();
        $("#format").val(data.format).select2();

        $("#devtime").change(function(){
            $("#dev_time").val($(this).val());
        });
        $("#ostime").change(function(){
            $("#os_time").val($(this).val());
        });
        $("#otatime").change(function(){
            $("#ota_time").val($(this).val());
        });

        $("#form-pro-add").validate({
            rules:{
                name:{
                    required:true,
                },
                pdname:{
                    required:true,
                },
                mname:{
                    required:true,
                },
                vpm:{
                    required: true,
                    minlength:1
                },
                devtime:{
                    required:true,
                },
                ostime:{
                    required:true,
                },
                otatime:{
                    required:true,
                },
                engteam:{
                    required: true,
                    minlength:1
                },
                format:{
                    required: true,
                    minlength:1
                }
            },
            messages:{
                name:{
                    required:'项目名称必须填写'
                },
                pdname:{
                    required:'产品名称必须要写'
                },
                mname:{
                    required:'市场名称必须填写',
                },
                vpm:{
                    required:'请选择vpm',
                },
                devtime:{
                    required:'Development(before SS)启动时间不能为空'
                },
                ostime:{
                    required:'OS upgrade 启动时间不能为空',
                },
                otatime:{
                    required:'OTA(12)启动时间不能为空'
                },
                engteam:{
                    required: '研发中心(Engineering Team) 请选择',
                },
                format:{
                    required: '形态(Format) 请选择',
                },
            },
            onkeyup:false,
            success:"valid",
            ignore:":hidden:not(select)",
            submitHandler:function(form){
                form.submit();
            }
        })



    </script>
@endsection

