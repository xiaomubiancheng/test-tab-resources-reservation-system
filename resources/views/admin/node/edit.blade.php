@extends('admin.layout.ucommon')
@section('css')

@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox-title">
        <h5><a href="{{route('admin.node.index')}}">节点列表</a>>节点修改:</h5>
    </div>
    <div class="ibox-content" >
        <div class="row row-lg">
            <div class="col-sm-12">
                <form action="{{route('admin.node.update',$model)}}"  class="form-horizontal" role="form"  id="form-node-edit" method="post" >
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>节点名称:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{$model->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">路由别名:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="route_name" name="route_name" value="{{$model->route_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><span class="text-danger">*</span>是否是菜单:</label>
                        <div class="col-sm-10">
                            <div class="">
{{--                                访问器--}}
                                {!!$model->menu !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><span class="text-danger">*</span>是否顶级:</label>
                        <div class="col-sm-10">
                            <select name="" id="pid" class="form-control select2" >
                                <option value="0">==顶级==</option>
                                @foreach($lists as $list)
                                    @if($model->id == $list['id'])
                                    <option value="{{$list['id']}}" selected>{{$list['html']}}{{$list['name']}}</option>
                                    @else
                                        <option value="{{$list['id']}}">{{$list['html']}}{{$list['name']}}</option>
                                        @endif
                                @endforeach
                            </select>
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

    <script>
     $(".select2").select2();


     $("#form-node-edit").validate({
         rules:{
             name:{
                 required:true,
         },
         messages:{
             name:{
                 required:'节点名称必须填写'
             },
         },
         onkeyup:false,
         success:"valid",
         submitHandler:function(form){
             form.submit();
         }
     })
    </script>
@endsection
