@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/select2/select2.css">
@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox-title">
        <h5><a href="{{route('admin.node.index')}}">节点列表</a>>节点添加:</h5>
    </div>
    <div class="ibox-content" id="app">
        <div class="row row-lg">
            <div class="col-sm-12">
                <form action="{{route('admin.node.store')}}"  class="form-horizontal" role="form"  id="form-node-add" method="post" @submit.prevent="dopost">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><span class="text-danger">*</span>节点名称:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" v-model.lazy="info.name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">路由别名:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="route_name" name="route_name" v-model="info.route_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><span class="text-danger">*</span>是否是菜单:</label>
                        <div class="col-sm-10">
                           <div class="">
                               <label class="radio-inline">
                                   <input type="radio" value="0" v-model="info.is_menu">
                                   <label for="">否</label>
                               </label>
                               <label class="radio-inline">
                                   <input type="radio" value="1" v-model="info.is_menu">
                                   <label for="">是(一级)</label>
                               </label>
                               <label class="radio-inline">
                                   <input type="radio" value="2" v-model="info.is_menu">
                                   <label for="">是(二级)</label>
                               </label>

                           </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><span class="text-danger">*</span>是否顶级:</label>
                        <div class="col-sm-10">
                            <select name="" id="" class="form-control select2" @change="changePid">
                                <option value="0">==顶级==</option>
                                @foreach($data as $list)
                                <option value="{{$list->id}}">{{$list->name}}</option>
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
    <script src="{{asset('static')}}/layer/layer.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/vue/vue.js"></script>

    <script>
        new Vue({
            el:'#app',
            data:{
                info:{
                    _token:"{{csrf_token()}}",
                    pid:0,
                    name:'',
                    route_name:'',
                    is_menu:0
                }
            },
            methods:{
                async dopost(evt){
                    let url = evt.target.action;
                    let {status,msg} = await $.post(url,this.info);

                    if(status ===0){
                        location.href="{{route('admin.node.index')}}";
                    }else{
                        layer.msg(msg,{icon:2,time:1000});
                    }
                },
                //下拉
                changePid(evt){
                    console.log(evt.target.value);
                    this.info.pid = evt.target.value ||0;
                }
            }
        })
    </script>
@endsection
