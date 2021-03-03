<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HumanController extends Controller
{
    public function index(){

        $firstDaytimestamps = strtotime(date("Y-m-1")); //当前月第一天
        $firstDay = date("Y-m-d",$firstDaytimestamps);
        $lastDaytimestamps = strtotime("$firstDay +1 month -1 day");
        $lastDay = date("Y-m-d",$lastDaytimestamps);

        $day_count = ($lastDaytimestamps-$firstDaytimestamps)/86400+1;

        $holidaysDate = DB::table("holiday")
            ->where('day','>=',$firstDay)
            ->where('day','<=',$lastDay)
            ->get()->toArray();

        $hArr = [];   //只有节假日的数组
        foreach($holidaysDate as $k=>$val){
            $hArr[] = $val->day;
        }


        $count = 0;
        $count1 = 1;
        $arr = [];
        for($i=$firstDaytimestamps;$i<$lastDaytimestamps;$i+=86400){
            if(in_array(date('Y-m-d',$i), $hArr)){
                $count++;
                continue;
            }else{
                if($count){
                    $count1++;
                }
                $count =0; //切换归零
                $arr[3][$count1][] = date('Y-m-d',$i) ;
            }
        }

        dd($arr);



        return view('admin.human.index');
    }

    /**
     * @param 开始时间 当前周
     * @param 先3个月
     */
    public function create(){

    }


}
