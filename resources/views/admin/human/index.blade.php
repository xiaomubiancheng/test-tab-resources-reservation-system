
@extends('admin.layout.ucommon')

@section('css')
    <link rel="stylesheet" href="{{asset('static')}}/admin/css/plugins/datapicker/datepicker3.css">
@endsection

@section('content')
        <div class="ibox-content">
            <div class="row row-lg" style="padding-left: 15px;margin-bottom:20px;" style="float: left">
                <div class="input-daterange input-group" id="datepicker" style="float: left">
                    <input type="text" class="input-sm form-control" name="start" id="start" >
                    <span class="input-group-addon">至</span>
                    <input type="text" class="input-sm form-control" name="end" id="end">
                </div>
                <div class="col-xs-1" style="float:left;"><button class="btn btn-default btn-outline" style="height:30px;" id="search" style="margin-bottom: 0px"  >查询</button></div>
            </div>
            <!---->
            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Toolbar -->
                    <div class="example-wrap">
                        <div class="example">
                            <table id="exampleTableToolbar" data-toggle="table" data-height="500"  data-pagination="true" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>节点名称</th>
                                    <th>路由别名</th>
                                    <th>是否是菜单</th>
                                    <th>加入时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

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
    <script type="text/javascript" src="{{asset('static')}}/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $(".input-daterange ").datepicker({
            autoclose: true, //自动关闭
            language:"zh-CN"
        })

        $("#start").datepicker("setDate",firstDayOfMonth());
        $("#end").datepicker("setDate",nextNextMonthLastDay());



        //当前月第一天
        function firstDayOfMonth(){
           var date = new Date();
           var y=date.getFullYear();
           var m=date.getMonth()+1;
           var d=1;
           var m=m<10?"0"+m:m;
           var d=d<10?"0"+d:d;
           return y+"-"+m+"-"+d;
        }

        //2个月后最后一天
        function nextNextMonthLastDay() {
            var time = new Date();
            var year = time.getFullYear();
            var month = time.getMonth() + 3;
            if (month > 12) {
                month = month - 12;
                year = year + 1;
            }
            var day = this.nextMonthDay(year, month);
            month = month<10?"0"+month:month;
            day = day<10?"0"+day:day;

            return year +'-' + month + '-' + day;
        }

        function nextMonthDay(year, month) {//判断每月多少天
            var day31 = [1, 3, 5, 7, 8, 10, 12];
            var day30 = [4, 6, 9, 11];
            if (day31.indexOf(month) > -1) {
                return 31;
            } else if (day30.indexOf(month) > -1) {
                return 30;
            } else {
                if (this.isLeapYear(year)) {
                    return 29;
                } else {
                    return 28;
                }
            }
        }

        function isLeapYear(year) {//判断是否为闰年
            return (year % 4 == 0) && (year % 100 != 0 || year % 400 == 0);
        }


    </script>
@endsection




