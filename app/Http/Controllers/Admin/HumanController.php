<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HumanController extends Controller
{
    public function index(){
        return view('admin.human.index');
    }


    //@111
    //生成财年的人力表格
    //4月1号至下一年的3月31
    public function tableInit(){
//当前年份20n-04-01
        $fiscalyeat_start = date("Y").'-'.'03-01';
        $fy_start_timestamp = strtotime($fiscalyeat_start);  //时间戳

        //20(n+1)-03-31
//        $fiscalyeat_end = date("Y-m-d",strtotime("+1 year",strtotime(date("Y")."-03-31")) );
//        $fy_end_timestamp = strtotime("+1 year",strtotime(date("Y")."-03-31")); //时间戳
        $fiscalyeat_end = date("Y").'-'.'12-31';
        $fy_end_timestamp = strtotime($fiscalyeat_end);  //时间戳


        //入库
        $saveData = [];
        $count=0;
        for($i=$fy_start_timestamp;$i<=$fy_end_timestamp;$i+=86400)
        {
            $saveData[$count]['timestamp'] = $i; //时间戳
            $saveData[$count]['date'] = date('Y-m-d',$i);
            $saveData[$count]['year'] = date("Y",$i);
            $saveData[$count]['month'] = date("m",$i);
            $saveData[$count]['day'] = date("d",$i);
            $saveData[$count]['week'] = date("W",$i);
            $count++;
        }

        DB::table("humTableInit")->insert($saveData);
    }

    public function tableInit1(){
        $fiscalyeat_start = date("Y").'-'.'01-01';
        $fy_start_timestamp = strtotime($fiscalyeat_start);  //时间戳
        $fiscalyeat_end = date("Y").'-'.'12-31';
        $fy_end_timestamp = strtotime($fiscalyeat_end);

        //节假日(含双休)
        $holidaysDate = DB::table("holiday")
            ->where('day','>=',$fiscalyeat_start)
            ->where('day','<=',$fiscalyeat_end)
            ->get()->toArray();
        $hArr = [];   //只有节假日的数组
        foreach($holidaysDate as $k=>$val){
            $hArr[] = $val->day;
        }

        $count = 0;
        $week_flag = 1; //当月第几周
        $arr = [];

        for($i=$fy_start_timestamp;$i<=$fy_end_timestamp;$i+=86400){
            $m = date('m',$i);
            if(in_array(date('Y-m-d',$i), $hArr)){  //跳过节假日
                $count++;
                continue;
            }else{
                if($count){
                    $week_flag++;
                }
                $count =0; //切换归零
                $arr[$m][$week_flag][] = date('d',$i) ;
            }
        }

        $sen_arr= [];
        $input_count =0;
        for($i=1;$i<=6;$i++){
            foreach ($arr as $mk => $mv) {
                foreach ($mv as $wk => $wv) {
                    $sen_arr[$input_count]['ttid'] = $i;
                    $sen_arr[$input_count]['year'] = '2021';
                    $sen_arr[$input_count]['month'] = $mk;
                    $sen_arr[$input_count]['week'] = min($wv).'-'.max($wv);
                    $sen_arr[$input_count]['begin'] = min($wv);
                    $sen_arr[$input_count]['end'] = max($wv);
                    $sen_arr[$input_count]['origin'] = 0;
                    $sen_arr[$input_count]['remain'] = 0;
                    $sen_arr[$input_count]['remain'] = 0;
                    $input_count++;
                }
            }
        }


        DB::table("humTableInit2")->insert($sen_arr);

    }


    public function CreateTable(Request $request){
        $inputData = $request->only(['start','end']);
    }


    /**
     * @param 开始时间 当前周
     * @param 先3个月
     */
    public function info(Request $request){
        $inputData = $request->only(['start','end']);
        $startDay = $inputData['start'];
        $s_timestamp = strtotime($startDay);
        $endDay = $inputData['end'];
        $e_timestamp = strtotime($endDay);


        $firstDaytimestamps = strtotime(date("Y-m-1")); //当前月第一天
        $firstDay = date("Y-m-d",$firstDaytimestamps);
        $lastDaytimestamps = strtotime("$firstDay +1 month -1 day");
        $lastDay = date("Y-m-d",$lastDaytimestamps);
//        //todo 根据查询得到有几个月


        $day_count = ($lastDaytimestamps-$firstDaytimestamps)/86400+1;
        //节假日(含双休)
        $holidaysDate = DB::table("holiday")
            ->where('day','>=',$startDay)
            ->where('day','<=',$endDay)
            ->get()->toArray();
        $hArr = [];   //只有节假日的数组
        foreach($holidaysDate as $k=>$val){
            $hArr[] = $val->day;
        }

        $m_arr = [];//存放月份
        $count = 0;
        $week_flag = 1; //当月第几周
        $arr = [];
//        $w_sum =0;  //(工作)周  总和
        $mw_arr = []; //月->周

        //第二行数据
//        $w_arr = ['01-05','08-12','01-05','08-12','01-05','08-12','01-05','08-12','01-05','08-12','01-05','08-12','01-05','08-12','01-05'];


        for($i=$s_timestamp;$i<=$e_timestamp;$i+=86400){
            $m = date('m',$i);
            if(!in_array($m,$m_arr)){
                $m_arr[] = $m;
                $week_flag =1;
            }

            if(in_array(date('Y-m-d',$i), $hArr)){  //跳过节假日
                $count++;
                continue;
            }else{
                if($count){
                    $week_flag++;
                }
                $count =0; //切换归零
                $arr[$m][$week_flag][] = date('d',$i) ;
            }
            $mw_arr[(int)$m] = $week_flag;
        }

        $sen_arr= [];
        $w_arr = [];
        $input_count =0;



        foreach ($arr as $mk => $mv) {
            foreach ($mv as $wk => $wv) {
                $w_arr[] = min($wv) . '-' . max($wv);
                $input_count++;
            }
        }





        return ['status'=>0,'data'=>compact('w_arr','mw_arr','arr')];
    }



    //人力修改
    public function update(Request $request){
        $id = $request->only(['id']);
        return ['status'=>0,'msg'=>'successs'];
    }

}
