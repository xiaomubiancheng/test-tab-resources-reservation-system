@extends('admin.layout.ucommon')

@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox-title">
        <h5><a href="{{route('admin.user.index')}}">用户列表</a>>用户修改:</h5>
    </div>
    <div class="ibox-content">
        <div class="row row-lg">
            <div class="col-sm-12">
                <form action="{{route('admin.user.edit',$model)}}"  class="form-horizontal" role="form"  id="form-user-edit" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>账号:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username"  value="{{$model->username}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="truename" class="col-sm-2 control-label"><span class="text-danger">*</span>姓名:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="truename"  name="truename"  value="{{$model->truename}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="itcode" class="col-sm-2 control-label">itcode:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="itcode" name="itcode" value="{{$model->itcode}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label"><span class="text-danger">*</span>邮箱:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{$model->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">密码:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password">
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
     $("#form-user-edit").validate({
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
