@extends('admin.layout.ucommon')

@section('css')
    <style>
        .permission-list{
            border: solid 1px #eee;
        }
        .permission-list > dt{
            background-color: #efefef;
            padding: 5px 10px;
        }
        .permission-list > dd > dl > dt {
            display: inline-block;
            float: left;
            white-space: nowrap;
            width: 100px;
        }
        .permission-list > dd > dl {
            border-bottom: solid 1px #eee;
            padding: 5px 0;
        }
        .cl, .clearfix {
            zoom: 1;
        }
        label {
            font-size: 14px;
        }

        dl {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            list-style-type: none;
        }
        dd{
            display: block;
            margin-inline-start: 40px;
        }
    </style>
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-title">
            <h5><a href="{{route('admin.role.index')}}">角色列表</a>>权限分配:</h5>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form action="{{route('admin.role.node',$role)}}"  class="form-horizontal" role="form"  id="form-role-node-add" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">角色名称:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span></span>拥有权限：</label>
                            <div class="col-sm-10">
                                @foreach($children[0] as $one_pri_id)
                                <dl class="permission-list">
                                    <dt>
                                        <label>
                                            <input type="checkbox" onclick="all_select(this)" value="{{$one_pri_id}}" name="ids[]" @if(in_array($pris[$one_pri_id]['id'],$ownNodes)) checked @endif >{{$pris[$one_pri_id]['name']}}
                                        </label>
                                    </dt>
                                    <dd>

                                        <dl class="cl">
                                            <dd>
                                                @foreach($children[$one_pri_id] as $two_pri_id)
                                                <label >
                                                    <input type="checkbox" onclick="up_select(this,'{{$one_pri_id}}')" value="{{$two_pri_id}}" name="ids[]" @if(in_array($pris[$two_pri_id]['id'],$ownNodes)) checked @endif>{{$pris[$two_pri_id]['name']}}
                                                </label>
                                                @endforeach
                                            </dd>
                                        </dl>

                                    </dd>
                                </dl>
                                @endforeach
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
    <script src="{{asset('static')}}/layer/layer.js"></script>
    <script>
        function all_select(obj){;
            $(obj).parents('dl').find('input').prop('checked',obj.checked);
        }

        // function all_line_select(obj) {
        //     $(obj).parents('dl:eq(0)').find('input').prop('checked',obj.checked);
        //     $(obj).parents('dl:eq(1)').children('dt').find('input').prop('checked', obj.checked);
        // }

        function up_select(obj,ids) {
            let arr = ids.split(',');
            for(var k in arr){
                $('input[value='+arr[k]+']').prop('checked', true);
            }
        }

        function up_top_select(obj){
            let length = $(obj).parents("dl:eq(1)").find("input[class='up_top_select']:checked").length;
            if(length ==0){
                $(obj).parents('dl:eq(1)').children('dt').find('input').prop('checked', false);
            }
        }

    </script>

@endsection





