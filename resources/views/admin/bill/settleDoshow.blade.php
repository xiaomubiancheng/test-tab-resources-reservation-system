@extends('admin.layout.ucommon')



@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.bill.settle')}}">提单结算列表</a>>提单结算:</h5>
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
                                    <input type="text" class="form-control datepicker" id="starttime" name="starttime" />
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








    </script>
@endsection
