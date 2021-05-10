@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/admin/css/plugins/datapicker/datepicker3.css">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.project.index')}}">项目列表</a>>提单列表:</h5>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Toolbar -->
                    <div class="example-wrap">
                        <div class="example">
                            <div class="btn-group hidden-xs" id="exampleToolbar" role="group">

                            </div>
                            <table id="exampleTableToolbar" data-toggle="table" data-height="500"  data-search="true" data-pagination="true" style="word-break:break-all;" >
                                <thead>
                                <tr>

                                    <th>项目名称</th>
                                    <th>提单编号</th>
                                    <th>测试类型</th>
                                    <th>提单总人力</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($bills as $key => $bill)
                                        <tr>
                                            <td>{{$bill->name}}</td>
                                            <td>{{$bill->name}}_{{$bill->project_id}}</td>
                                            <td>{{$bill->proname}}</td>
                                            <td>{{$bill->manpower}}</td>
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
    <script type="text/javascript" src="{{asset('static')}}/jquery-validate/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/jquery-validate/dist/localization/messages_zh.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>

    </script>
@endsection

