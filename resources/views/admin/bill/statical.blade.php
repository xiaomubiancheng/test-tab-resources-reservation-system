@extends('admin.layout.ucommon')

@section('content')
    <div class="ibox-title">
        <div class="row">
            <form role="form" class="form-inline" >
                <div class="form-group col-sm-6" >
                    <select class="form-control " name="staType" id="staType" style="width:100%;margin-left:5px;">
                        <option value="1">预算统计</option>
                        <option value="2">结算统计</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control datepicker" style="width:100%" id="time" name="time">
                </div>
            </form>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row" id="container" style="width:800px;height:500px;">

        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('static')}}/echart5/echarts.min.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script>
        $('.select2').select2();

        $('.datepicker').datepicker({
            autoclose:true, //当选择一个日期之后是否立即关闭此日期时间选择器
            "format":"yyyy-mm-dd",
            Highlight :true, //高亮显示
        });

        init(1);

        $("#staType").on('change',function(){
            var staType = $(this).val();
            console.log(staType);
            init(staType);
        });

        function init(type){
            $.post("{{route('admin.bill.staticalShow')}}",{_token:"{{csrf_token()}}",staType:type},res =>{
                res;
            }).then(({status,data})=>{

                var title = "项目预算情况";
                if(type == 2){
                    title = "项目结算情况"
                }

                var dom = document.getElementById("container");
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
                        text: title
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
        }



    </script>
@endsection


