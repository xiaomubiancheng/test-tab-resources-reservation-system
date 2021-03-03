@extends('admin.layout.ucommon')


@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox-content">
            <div class="row col-sm-12">
                <div class="form-group col-sm-6 ">
                    分组:
                    <input type="text" class="form-control" value="" name="" readonly>
                </div>
                <div class="form-group col-sm-6 ">
                    提单人:
                    <input type="text" class="form-control" value="" name="" readonly>
                </div>
            </div>
            <div>
                <div class="form-group col-sm-6">
                    <label>项目名称:</label>
                    <select style="width: 100%" class="form-control"  name="" id="backup" >
                    </select>
                </div>
                <div class="form-group col-sm-6" style="margin-top:23px;">
                    <div >
                        <button type="submit" class="btn  btn-success">查询</button>
                    </div>
                </div>
            </div>

            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Toolbar -->
                    <div class="example-wrap">
                        <div class="example">
                            <table id="exampleTableToolbar" data-toggle="table" data-height="700"  data-search="true" data-pagination="true" >
                                <thead>
                                <tr>
                                    <th>提单测试项</th>
                                    <th>提单人</th>
                                    <th>项目</th>
                                    <th>提单ID</th>
                                    <th>提单人力</th>
                                    <th>结算人力</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="label label-success">修改</a>
                                        <a href="" class="label label-success">提交</a>
                                    </td>
                                </tr>
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
<script>

</script>
@endsection




