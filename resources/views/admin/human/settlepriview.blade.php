@extends("admin.layout.ucommon")

@section('css')

@endsection



@section('content')
    <div class="ibox-title">
        <div class="row">
            <form role="form" class="form-inline" >
                <div class="form-group col-sm-6" >
                    <label for="name" >可使用人力</label>
                    <select class="form-control " name="time_range" id="time_range" style="width:80%;margin-left:5px;">
                        <option value="6">半年</option>
                        <option value="3">三个月</option>
                        <option value="12">全年</option>
                    </select>
                </div>
{{--                <div class="col-sm-6">--}}
{{--                    <a href="{{route('admin.bill.index')}}" >--}}
{{--                        <button type="button" class="btn btn-outline btn-default">--}}
{{--                            提单--}}
{{--                        </button>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row" >
            <div class="col-sm-6" id="h_div">
                <table id="hum_table" class="table table-bordered">

                </table>
            </div>
        </div>

        <div class="row" id="container" style="width:800px;height:260px;">

        </div>

        <div class="row" id="container1" style="width:1200px;height:460px;margin-top:50px;">

        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('static')}}/echart5/echarts.min.js"></script>
    <script>

        initTable();
        function initTable(){
            var time_range = $("#time_range").val();
            $.post("{{route('admin.hr.humtable')}}",{_token:"{{csrf_token()}}",time_range:time_range},function(data){

                let month = data.data.month;
                let arr = data.data.arr;
                let ttype = data.data.ttype;
                let series = data.data.series;

                $("#h_div").attr('class',"col-sm-"+month.length);
                let html= "";
                html+='<thead><tr>';
                html += '<td style="width:6%;"></td>';
                for(var item in month){
                    html+=`<td style="width:2%;">${month[item]}月</td>`;
                }
                html+= '</tr></thead>';

                html+='<tbody>';
                for(var item in arr){
                    html+='<tr>';
                    html+=`<td>${item}</td>`;
                    for(var val in arr[item]){
                        html+=`<td>${arr[item][val]['hum']}</td>`;
                    }
                    html+='</tr>';
                }
                html+='</tbody>';
                $("#hum_table").html(html);


                initLine('container',month,ttype,series);



            },'json');

        }

        $("#time_range").on('change',function(){
            initTable();
        });

        function initLine(div,month,ttype,series){
            var dom = document.getElementById(div);
            var myChart = echarts.init(dom);
            var app = {};

            var option;


            option = {
                title: {
                    text: '可使用人力'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data:ttype
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                // toolbox: {
                //     feature: {
                //         saveAsImage: {}
                //     }
                // },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: month
                },
                yAxis: {
                    type: 'value',
                    max:100
                },
                color:['#5470c6', '#91cc75', '#fac858', '#ee6666', '#73c0de', '#000'],
                series: series
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }
        }
    </script>
    <script>

        $.get("{{route('admin.hr.initBudget')}}",{_token:"{{csrf_token()}}"},res =>{
             res;
        }).then(({status,data})=>{

            var dom = document.getElementById("container1");
            var myChart = echarts.init(dom);
            var app = {};
            var option;

            var xAxisData = []; //项目
            var data1 = [];
            var data2 = [];
            var data3 = [];

            xAxisData = data.pros;
            data1 = data.data1;
            data2 = data.data2;
            data3 = data.data3;

            var emphasisStyle = {
                itemStyle: {
                    shadowBlur: 10,
                    shadowColor: 'rgba(0,0,0,0.3)'
                }
            };

            option = {
                title: {
                    text: '项目预算情况'
                },
                legend: {
                    data: ['已使用', '未使用', '超出'],
                    left: '20%'
                },

                toolbox: {
                    feature: {
                        dataView: {title:"数据视图",show:true},
                    },
                },
                tooltip: {},
                xAxis: {
                    data: xAxisData,
                    name: 'X Axis',
                    axisLine: {onZero: true},
                    splitLine: {show: false},
                    splitArea: {show: false},
                    axisLabel:{show:true}
                },
                yAxis: {},
                grid: {
                    bottom: 100
                },
                color:['#5470c6', '#91cc75', '#ee6666'],
                series: [
                    {
                        name: '已使用',
                        type: 'bar',
                        stack: 'one',
                        emphasis: emphasisStyle,
                        data: data1
                    },
                    {
                        name: '未使用',
                        type: 'bar',
                        stack: 'one',
                        emphasis: emphasisStyle,
                        data: data2
                    },
                    {
                        name: '超出',
                        type: 'bar',
                        stack: 'one',
                        emphasis: emphasisStyle,
                        data: data3
                    }
                ]
            };

            myChart.on('brushSelected', renderBrushed);

            function renderBrushed(params) {
                var brushed = [];
                var brushComponent = params.batch[0];

                for (var sIdx = 0; sIdx < brushComponent.selected.length; sIdx++) {
                    var rawIndices = brushComponent.selected[sIdx].dataIndex;
                    brushed.push('[Series ' + sIdx + '] ' + rawIndices.join(', '));
                }

                myChart.setOption({
                    title: {
                        backgroundColor: '#333',
                        text: 'SELECTED DATA INDICES: \n' + brushed.join('\n'),
                        bottom: 0,
                        right:'10%',
                        width: 100,
                        textStyle: {
                            fontSize: 12,
                            color: '#fff'
                        }
                    }
                });
            }

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }


        });


       var p = new Promise((suc,ret)=>{
            var time_range = $("#time_range").val();
           $.ajax({
               url:"{{route('admin.hr.humtable')}}",
               type:"POST",
               dataType:'json',
               data:{_token:"{{csrf_token()}}",time_range:time_range},
               success:ret=>suc,
               fail:()=>ret
           })
       })

    </script>
@endsection
