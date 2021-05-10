<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HumanController extends Controller
{
    //人力资源管理
    public function index(){
//        return view('admin.human.index');
        return view('admin.human.humanmange');
    }

    //预算页
    public function settlepriview(){
        return view('admin.human.settlepriview');
    }

    //index页表格数据
    public function humtable(Request $request){
        $time_range = ($request->only(['time_range']))['time_range'];
        $month = intval(date("m"));
        $end = ($month+$time_range<12)?$month+$time_range-1:12;

        $data = Db::table("humtableinit2")
            ->select("ttid","protesttypes.name as tname","month", DB::raw('SUM(remain) as hum'))
            ->where([
            ['month','>=',$month],
            ['month','<=',$end],
            ])
            ->leftJoin("protesttypes","humtableinit2.ttid",'=', 'protesttypes.id')
            ->groupBy("ttid","month")
            ->get()->toArray();

        $arr = [];
        $month = [];
        $ttype = [];
        $series = [];
        foreach($data as $key=>$val){
            if(!in_array($val->month,$month)){
                $month[] = intval($val->month);
            }
            if(!in_array($val->tname,$ttype)){
                $ttype[] = $val->tname;
            }
            $arr[$val->tname][] = $val;
            $series[$val->ttid-1]['data'][]= $val->hum;
            $series[$val->ttid-1]['name']= $val->tname;
            $series[$val->ttid-1]['type']= 'line';
        }
        return ['status'=>0, 'data'=>compact('arr','month','ttype','series')];
    }

    /**
     * 项目预算
     * @param  Request  $request
     * @return array
     */
    public function initBudget(Request $request){
        //绿色（未使用） = 项目预算-黄色
        //红色 = 提交(总) - 预算
        //蓝色(使用) = 提交(总)
        $projects = DB::table('projects')
            ->select("id","name","dev_budget","os_budget","ota_budget")
            ->where("deleted_at",'=',null)
            ->get()->toArray();

        $bills = DB::table('bill')->where([
            ['is_use','=', 2]
        ])->get()->toArray();

        //已使用
        $bill_new = array();
        foreach($bills as $k=>$v){
            $bill_new[$v->id] = $v->manpower * 200;
        }

        $data = array();
        foreach($projects as $val){
            $data[$val->id]['unused'] = 0;
            $data[$val->id]['used'] = 0;
            $data[$val->id]['over'] = 0;
            $pro_sum = $val->dev_budget + $val->os_budget + $val->ota_budget; //预算
            foreach($bill_new as $bk=>$bv){
                if($val->id == $bk){
                    if($pro_sum >= $bv){
                        $data[$val->id]['unused'] = $pro_sum - $bv;
                        $data[$val->id]['used'] = $bv;
                    }else{
                        $data[$val->id]['used'] = $bv;
                        $data[$val->id]['over'] = $bv - $pro_sum;
                    }
                    unset($bill_new[$bk]);
                }
            }
        }

        $data1 = [];//已使用
        $data2 = []; //未使用
        $data3 = []; //超出
        $pros = []; //项目

        $pros = array_column($projects,'name');
        $data2 = array_column($data,'unused');
        $data1 = array_column($data,'used');
        $data3 = array_column($data,'over');
        return ['status'=>0, 'data'=>compact('pros','data1','data2', 'data3')];
    }

    //index 页 数据库数据生成
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
        $sen_arr_detail = [];
        $input_count =0;
        for($i=1;$i<=6;$i++){
            $week_count = 1;
            foreach ($arr as $mk => $mv) {

                foreach ($mv as $wk => $wv) {
                    $sen_arr[$input_count]['ttid'] = $i;
                    $sen_arr[$input_count]['year'] = '2021';
                    $sen_arr[$input_count]['month'] = $mk;
                    $sen_arr[$input_count]['week'] = min($wv).'-'.max($wv);
                    $sen_arr[$input_count]['begin'] = min($wv);
                    $sen_arr[$input_count]['end'] = max($wv);
                    $sen_arr[$input_count]['origin'] = '';
                    $sen_arr[$input_count]['remain'] = '';
                    $sen_arr[$input_count]['week_count'] = $week_count;
                    $sen_arr[$input_count]['day_count'] = count($wv);
                    $input_count++;
                    $week_count++;

                }
            }
        }

        DB::table("humTableInit2")->insert($sen_arr);

    }


    public function CreateTable(Request $request){
        $inputData = $request->only(['start','end']);
        $startDay = $inputData['start'];
        $s_timestamp = strtotime($startDay);
        $endDay = $inputData['end'];
        $e_timestamp = strtotime($endDay);

    }


    /**
     * 查询
     * @param  Request  $request
     * @return array
     */
    public function info(Request $request){
        #接收数据
        $inputData = $request->only(['start','end']);

        $start = $inputData['start'];
        $stimestamp = strtotime($start);
        $end = $inputData['end'];
        $etimestamp = strtotime($end);

        //
        $year[] = date("Y",strtotime($start));
        $year[] = date("Y",strtotime($end));
        $year = array_unique($year);

        $ym_arr=[];

        $count=0;
        for($i=$stimestamp;$i<$etimestamp;$i+=86400){
            $ym_arr[$count]['year'] = date('Y',$i);
            $ym_arr[$count]['month'] = date('m',$i);

            $count++;
        }
        $ym_arr = array_unique($ym_arr,SORT_REGULAR);

        $initDatas = [];

        foreach($ym_arr as $k=>$v){

            $initDatas[] =  DB::table("humtableinit2")->where([
                ['year','=',$v['year']],
                ['month','=',$v['month']],
            ])->get()->toArray();
        }

        $w_arr = []; //周
        $mw_arr=[];
        foreach($initDatas as $initData){
          foreach($initData as $list){
              if($list->ttid == 1){
                  $w_arr[] = $list->week;
                  $mw_arr[$list->month][] = $list->week;
              }

          }
        }

        foreach ($mw_arr as $k=>$v){
            $mw_arr[$k] = count($v);
        }

        $new_arr = [];
        foreach($initDatas as $key=>$initData){ //月份
            foreach ($initData as $columns){
                $new_arr[$columns->ttid][] = $columns;
            }
        }

        $testTypes = DB::table("protesttypes")->get()->toArray();
        $rows_arr= [];
        foreach($testTypes as $k=>$v){
            $rows_arr[$k+1]['column'] = $v->name;
        }

        foreach ($new_arr as $k=>$row_arr){
            foreach($row_arr as $kk=>$item){
                $rows_arr[$k]['data'][$kk]['origin'] = $item->origin;
                $rows_arr[$k]['data'][$kk]['remain'] = $item->remain;
                $rows_arr[$k]['data'][$kk]['week'] = $item->week;
                $rows_arr[$k]['data'][$kk]['ttid'] = $item->ttid;
                $rows_arr[$k]['data'][$kk]['month'] = $item->month;
                $rows_arr[$k]['data'][$kk]['year'] = $item->year;
            }
        }

        return ['status'=>0,'data'=>compact('w_arr','mw_arr','rows_arr')];
    }


    /**
     * @param 开始时间 当前周
     * @param 先3个月
     */
    public function info1(Request $request){
        #接收数据
        $inputData = $request->only(['start','end']);
        $startDay = $inputData['start'];
        $s_timestamp = strtotime($startDay);
        $endDay = $inputData['end'];
        $e_timestamp = strtotime($endDay);


        $firstDaytimestamps = strtotime(date("Y-m-1")); //当前月第一天
        $firstDay = date("Y-m-d",$firstDaytimestamps);
        $lastDaytimestamps = strtotime("$firstDay +1 month -1 day");//当月最后一天
        $lastDay = date("Y-m-d",$lastDaytimestamps);
        //todo 根据查询得到有几个月


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
        $inputData = $request->only(['id','value']);
        $id = $inputData['id'];
        $value = $inputData['value'];
        $data = explode('-',$id);
        $ttid = $data[0];
        $year = $data[1];
        $week = $data[2].'-'.$data[3];


        //修改origin
        //初始值origin和remain一样()
        //目前是填完不让修改
        //修改remian = $origin - 已经消耗的人力  todo
        $re = DB::table("humtableinit2")->where([
            ['ttid' ,'=', $ttid],
            ['year', '=', $year],
            ['week', '=', $week],
            ['origin_edit','=', 1]
        ])->update(['origin'=>$value,'remain'=>$value,'origin_edit'=>2]);


        if(!$re){
            return ['status'=>1000,'msg'=>'error'];
        }
        return ['status'=>0,'msg'=>'successs'];
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

}
