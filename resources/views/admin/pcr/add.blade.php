@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/select2/select2.css">
    <link rel="stylesheet" href="{{asset('static')}}/webuploader-0.1.5/webuploader.css">
    <script type="text/javascript" src="{{asset('static')}}/vue/vue.js"></script>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.pcr.index')}}">PCR列表</a>>PCR添加:</h5>
        </div>
        <div class="ibox-content" id="app">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form action="{{route('admin.pcr.store')}}"  class="form-horizontal" role="form"  id="form-pcr-add" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>项目名称:</label>
                            <div class="col-sm-10">
                                <select name="project_id" id="project_id"  class="form-control select2" >
                                    <option value=""></option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>PCR需求:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="content" name="content">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>费用:</label>
                            <div class="col-sm-10">
                                <input type="number" min='0' class="form-control" id="cost" name="cost">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>证据:</label>
                            <div class="col-sm-4">
{{--                                <input type="file" class="form-control" name="pic">--}}
                                <div id="picker">
                                   上传证据
                                </div>
                            </div>
                            <div  class="col-sm-6" >
                                <img src="" id="img"  style="width: 200px;">
                                <input type="hidden" name="img" value="">
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
    <script src="{{asset('static')}}/webuploader-0.1.5/webuploader.js"></script>
    <script>

        // 初始化Web Uploader
        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: true,
            // swf文件路径
            swf: '/static/webuploader-0.1.5/Uploader.swf',
            // 文件接收服务端。
            server: '{{route('admin.pcr.uppic')}}',
            formData:{
              _token:'{{csrf_token()}}'
            },
            fileVal:'pic',
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#picker',
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });


        // 上传成功时的回调方法
        uploader.on('uploadSuccess', function (file, ret) {
            // 图片路径
            let src = ret.url;
            // 给表单添加value值
            $('#pic').val(src);
            // 给图片添加src
            $('#img').attr('src',src);
            $("[name='img']").val(src);

        });


        //------提交数据------

        $("#form-pcr-add").validate({
            rules:{
                project:{
                    required:true,
                },
                cost:{
                    required:true,
                },
                content:{
                    required:true,
                }

            },
            messages:{
                project:{
                    required:'项目必填'
                },
                cost:{
                    required:'费用必填'
                },
                content:{
                    required:'PCR需求必填'
                }
            },
            onkeyup:false,
            success:"valid",
            submitHandler:function(form){
                // form.submit();
                //表单提交地址
                let url = $(form).attr('action');
                //表单序列化
                let data = $(form).serialize();
                let img = $("#img").attr('src');
                if(img == "" || img ==undefined){
                    layer.msg('必须上传证据',{icon:2});
                    return false;
                }
                console.log(img);
                $.post(url, data ).then(({status,msg})=>{
                    if(status ==0){
                        layer.msg(msg,{icon:1,time:2000},()=>{
                            location.href = "{{route('admin.pcr.index')}}";
                        });
                    }else{
                        layer.msg(msg,{icon:2,time:2000});
                    }
                });
            }
        })


    </script>

@endsection
