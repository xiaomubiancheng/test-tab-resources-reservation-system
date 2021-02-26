
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
            <h5><a href="{{route('admin.user.index')}}">用户列表</a>>权限分配:</h5>
        </div>
        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form action="{{route('admin.user.role',$user)}}"  class="form-horizontal" role="form"  id="form-role-node-add" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label"><span class="text-danger">*</span>用户名称:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$user->truename}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span></span>所有角色：</label>
                            <div class="col-sm-10">
                                @foreach($roleAll as $item)
                                    <dl class="permission-list">
                                        <dt>
                                            <label>
                                                <input type="radio" value="{{$item->id}}" name="role_id" @if(in_array($item->id, $ownRoles)) checked @endif >{{$item->name}}
                                            </label>
                                        </dt>
                                        <dd>


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
@endsection





