@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/select2/select2.css">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.pcr.index')}}">PCR列表</a>>PCR添加:</h5>
        </div>
        <div class="ibox-content" id="app">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form action="{{route('admin.pcr.store')}}"  class="form-horizontal" role="form"  id="form-pcr-add" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>项目名称:</label>
                            <div class="col-sm-10">
                                <select name="" id="" class="form-control select2" >
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>PCR需求:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="route_name" name="route_name" v-model="info.route_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>费用:</label>
                            <div class="col-sm-10">
                                <input type="number" min='0' class="form-control" id="route_name" name="route_name" v-model="info.route_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>证据:</label>
                            <div class="col-sm-4">
                                <div id=""><button class="btn  btn-success"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i>上传证据</button></div>
                            </div>
                            <div >

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
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
    <script src="{{asset('static')}}/layer/layer.js"></script>

@endsection
