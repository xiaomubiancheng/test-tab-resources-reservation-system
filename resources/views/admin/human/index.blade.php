
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
                        <div class="example" id="table">

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
        const _token = "{{csrf_token()}}";
        $(".input-daterange ").datepicker({
            autoclose: true, //自动关闭
            language:"zh-CN"
        })

        $("#start").datepicker("setDate",firstDayOfMonth());
        $("#end").datepicker("setDate",nextNextMonthLastDay());

        //第一次请求
        var start = $("#start").val();
        var end = $("#end").val();
        var tableData=[];
        var arr1;
        var w_arr;
        $.ajax({
            async: false,
            url:"{{route('admin.hr.info')}}",
            data:{_token:_token,start:start,end:end},
            type:"POST",
            dataType:'json',
            success:function (data) {
                tableData = data.data;
                w_arr = tableData.w_arr;
                arr1 = tableData.mw_arr;
            }
        })
        {{--$.post("{{route('admin.hr.info')}}",{_token:_token,start:start,end:end},function(data){--}}
        {{--    tableData = data.data;--}}
        {{--},'json');--}}

        // $('td').click(function(){
        //     console.log($(this));
        // })

        //查询
        $("#search").click(function(){
            var start = $("#start").val();
            var end = $("#end").val();
            $.post("{{route('admin.hr.info')}}",{_token:_token,start:start,end:end},function(data){

            },'json');
        });


        //
        var html = '';
        html += `
                <table id="human" class="table table-bordered text-center"  width="1000px;" height="350px;">
                       <tr>
                           <td colspan="1">月份</td>
                `;



        for(var key in arr1) {  //3
            html += `<td colspan="${arr1[key]*2}" id="">${key}</td>`;
        }

        html += `
        </tr>
        <tr>
            <td>周(工作日)</td>
            `;
        for(var i=0;i<w_arr.length;i++){
            html+=`
            <td colspan="2">${w_arr[i]}</td>
        `;
        }

        html+=`</tr>`;

        //@1
        for(var i=0;i<6;i++){
            html+=`<tr>`;
            for(var j=0;j<=26;j++) {
                if(j==0){
                    html += `<td>CTS/人力</td>`;
                }else{
                    if(j%2!=0) {
                        html += `<td   id='${j}'>1</td>`;
                    }else{
                        html += `<td style="color:#ccc">1</td>`;
                    }
                }
            }

            html+=`</tr>`;
        }

        html+=`</table>`;
        $("#table").html(html);


        //人力修改
        $("td ").dblclick(function () {
            var td = $(this);
            // console.log(td);
            var text = td.text();
            var id= $(this).attr('id');
            if(id==null){
                return ;
            }


            var input = $("<input type='text'/>");
            // console.log(td.context.clientWidth);
            input.width(td.context.clientWidth);
            input.height(td.context.clientHeight);
            input.val(text);
            td.html("");
            input.appendTo(td).focus().select();
            input.click(function () {
                return false;
            })

            input.blur(function(){
                var inputTest = $(this).val();
                if(inputTest == text){
                    td.html(text);
                    return;
                }
                td.html(inputTest);
                $.ajax({
                    type:"POST",
                    url:"{{route('admin.hr.update')}}",
                    data:{_token:_token,id:inputTest},
                    dataType:'json',
                    success:function(data){
                        if(data.status==0){
                            layer.msg('修改成功',{icon:1});
                        }
                    },
                });

            })

        });



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




