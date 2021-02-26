@extends('admin.layout.ucommon')

@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox-title">
        <h5><a href="{{route('admin.role.index')}}">角色列表</a>>角色修改:</h5>
    </div>
    <div class="ibox-content">
        <div class="row row-lg">
            <div class="col-sm-12">
                <form action="{{route('admin.role.update',$model)}}"  class="form-horizontal" role="form"  id="form-role-edit" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>角色名称:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"  value="{{$model->name}}">
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
     $("#form-role-edit").validate({
         rules:{
             name:{
                 required:true,
             },
         },
         messages:{
             name:{
                 required:'账号必须填写'
             },
         },
         onkeyup:false,
         success:"valid",
         submitHandler:function(form){
             let url = $(form).attr('action');
             //表单序列化
             let data = $(form).serialize();

             $.ajax({
                 url,
                 data,
                 type:'PUT',
             }).then(({status,msg})=>{
                 if(status ==0){
                    layer.msg(msg,{icon:1,time:2000},()=>{
                        location.href = "{{route('admin.role.index')}}";
                    })
                 }else{
                     layer.msg(msg,{icon:2,time:2000});
                 }
             });
         }
     })
    </script>
@endsection
