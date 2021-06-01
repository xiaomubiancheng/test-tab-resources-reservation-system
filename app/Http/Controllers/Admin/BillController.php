<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Bill;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use App\Common\Hum\HumPrice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Common\Err\ApiErrDesc;
use App\Http\Response\ResponseJson;


class BillController extends Controller
{
    use ResponseJson;
    /**
     * 提单列表显示页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = DB::table("bill")
            ->select("bill.*","projects.name","pro.name as proname")
            ->leftJoin('projects','bill.project_id','=','projects.id')
            ->leftJoin('protesttypes as pro', 'bill.ttype','=', 'pro.id')
            ->where("is_use",'=', 1)
            ->where('is_delete','=', 1)
            ->orderBy('id','desc')
            ->get()->toArray();

        $billsO = DB::table("bill")
            ->select("bill.*","projects.name","pro.name as proname")
            ->leftJoin('projects','bill.project_id','=','projects.id')
            ->leftJoin('protesttypes as pro', 'bill.ttype','=', 'pro.id')
            ->where("is_use",'=', 2)
            ->where('is_delete','=', 1)
            ->orderBy('id','desc')
            ->get()->toArray();


        return view('admin.bill.index',compact('bills','billsO'));
    }




    /**
     * 提单添加页面显示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $str = url()->previous();
        $str = substr($str,strrpos($str,"/")+1);
        $ttypes = DB::table("protesttypes")->pluck('name','id')->toArray();
        $projects_info = DB::table("projects")
            ->select('id','name')
            ->where("deleted_at",'=',null)
            ->get();
        $projects = array();
        foreach ($projects_info as $v){
            $projects[$v->id] = $v->name;
        }

        if($str == 'index'){
            DB::table("assist")->update(['project_id'=>0,'status'=>1]);
        }
        return view('admin.bill.add',compact('ttypes','projects'));
    }



    public function getStatus(){
        $data = DB::table("assist")->select('status','project_id')->first();
        return ['status'=>0,'data'=>$data];
    }

    /**
     * 已保存状态数据
     */
    public function preserve(Request $request){
      $project_id = ($request->only(['project_id']))['project_id'];


       $uid = Auth::guard('user')->user()->id;
       $data =  DB::table("bill")
           ->select("bill.*","projects.name","pro.name as proname")
           ->leftJoin('projects','bill.project_id','=','projects.id')
           ->leftJoin('protesttypes as pro', 'bill.ttype','=', 'pro.id')
           ->where([
                ['bill.is_use','=',1],
                ['bill.created_at','>=',time()-30*60],
                ['uid','=',$uid],
                ['bill.project_id','=',$project_id]
            ])
           ->get();

       return $this->jsonSuccessData($data);
    }

    /**
     * 批量提交 修改提单的状态
     */
    public function preserveBatch(Request $request){
        $data = $request->only(['id_arr']);
        $id_arrs = $data['id_arr'];

        foreach($id_arrs as $k=>$v){

            if( $billModel = Bill::find($v) ){
                $email = DB::table("users")->where("id",'=',$billModel->uid)->value('email');
                $billModel->is_use  = 2;
                if( $billModel->save()){
                    //发送邮件
                    Mail::send('mail.changestatus',compact('v'),function(Message $message) use($email){
                        //发给谁
                        $message->to($email);
                        //主题
                        $message->subject('提单提交成功!');
                    });
                }
            }else{
                continue;
            }

        }

        return $this->jsonSuccessData();

    }

    /**
     * 项目费用预览
     */
    public function costPriview(Request $request){
        $project_id = ($request->only(['project_id']))['project_id'];

        $project = DB::table('projects')
            ->select("id","name","dev_budget","os_budget","ota_budget")
            ->where("deleted_at",'=',null)
            ->where('id','=',$project_id)
            ->first();
        //已使用
        $bills = DB::table('bill')
            ->where([
                ['project_id','=',$project_id]
            ])->get()->toArray();


        $origin = 0;
        $use = 0;
        $origin = $project->dev_budget+$project->os_budget+$project->ota_budget;
        $uid = Auth::guard('user')->user()->id;
        //当前提单
        $uid_bills = DB::table('bill')
            ->where([
                ['bill.created_at','>=',time()-30*60],
                ['uid','=',$uid],
                ['bill.project_id','=',$project_id]
            ])->get();

        foreach($bills as $k=>$v){
            $use += round(($v->manpower * (23*1000/12/21.75*7)),2);
        }


        $uid_use =0;
        foreach($bills as $k=>$v){
            $uid_use += round(($v->manpower * (23*1000/12/21.75*7)),2);
        }
        $last = $origin-$use;

        return ['status'=>0, 'data'=>compact('use','last','uid_use')];
    }

    /**
     * Store a newly created resource in storage.
     * 提单提交
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->except(['_token']);


        $sku = $postData['sku'];
        $ttype = $postData['ttype'];
        $tcontent = $postData['tcontent'];
        $data = $postData['data'];
        $arr = array();
        parse_str($data, $arr);
        $submit_status = (int)$arr['submit_status']; //1-正常提交(非自定义)2-顺延3-加班4-自定义
        if($submit_status == 4){
            $manpower = $arr['custom_manpower'];
        }else{
            $manpower = $arr['manpower'];
        }


        $bill = array();
        $bill_list = array();
        $bill['submit_status'] = (int)$arr['submit_status'];
        $bill['project_id'] = (int)$arr['project'];
        $bill['sku'] = (int)$sku;
        $bill['uid'] = Auth('user')->id();
        $bill['ttype'] = (int)$ttype;
        $bill['tcontent'] = (int)$tcontent;
        if($submit_status == 4){
            $bill['startTime'] = $arr['starttime'];
        }else{
            $bill['startTime'] = $arr['auto_starttime'];
        }
        if($submit_status == 4){
            $bill['endTime'] = $arr['endtime'];
        }else{
            $bill['endTime'] = $arr['auto_endtime'];
        }
        if($submit_status == 4){
            $bill['workday'] = (int)$arr['custom_workday'];
        }else{
            $bill['workday'] = (int)$arr['workday'];
        }
        $bill['manpower'] = (int)$arr['manpower'];
        $bill['mostManpower'] = (int)$arr['mostManpower'];
        $bill['overManpower'] = (int)$arr['overManpower'];
        $bill['content'] = $arr['content'];
        $bill['created_at'] = time();

        //从表
        $bill_list['bill_id'] = 0;
        $bill_list['manpower'] = 0;
//        $bill_list['ttype'] = $ttype;
//        $bill_list['week_count'] = 0;

        try{
            DB::beginTransaction();
            //入库bill 返回ID
            $id = DB::table("bill")->insertGetId($bill);

            $bill_list['bill_id'] = $id;
            if($submit_status == 4){
                $s_year = substr($arr['starttime'],0,4);
                $s_month = substr($arr['starttime'],5,2);
                $s_day = substr($arr['starttime'],8,2);
                $e_year = substr($arr['endtime'],0,4);
                $e_month = substr($arr['endtime'],5,2);
                $e_day = substr($arr['endtime'],8,2);
            }else{
                $s_year = substr($arr['auto_starttime'],0,4);
                $s_month = substr($arr['auto_starttime'],5,2);
                $s_day = substr($arr['auto_starttime'],8,2);
                $e_year = substr($arr['auto_endtime'],0,4);
                $e_month = substr($arr['auto_endtime'],5,2);
                $e_day = substr($arr['auto_endtime'],8,2);
            }

            $first_info = DB::table("humtableinit2")->where([
                ['year','=',$s_year],
                ['month','=',$s_month],
                ['begin','<=',$s_day],
                ['end','>=',$s_day],
                ['ttid','=',$ttype]
            ])->first();
            $first_week_count = $first_info->week_count;
            $last_info = DB::table("humtableinit2")->where([
                ['year','=',$e_year],
                ['month','=',$e_month],
                ['begin','<=',$e_day],
                ['end','>=',$e_day],
                ['ttid','=',$ttype]
            ])->first();
            $last_week_count = $last_info->week_count;

            if($submit_status === 1){ //正常非自定义提交
                $this->Status1($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$last_info,$bill_list);
            }elseif($submit_status === 2){ //顺延
                $this->Status2($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$bill_list);
            }elseif($submit_status === 3){ //加班
                $this->Status3($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$last_info,$arr,$bill_list);
            }elseif($submit_status == 4){ //自定义
                $this->Status4($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$last_info,$bill_list);
            }

            DB::commit();

            #-----email start
//            $userInfo = DB::table("users")->select('email','depart','is_chargeman')->where("id",'=',$bill['uid'])->first();
//            $useremail = $userInfo->email;
//            $cc_email ='';
//            //当前用户不是组长就查询
//            if($userInfo->is_chargeman != 1) {
//                //组长邮件
//                $cc_email = DB::table("users")->where([
//                    ["is_chargeman",'=',1],
//                    ['depart','=',$userInfo->depart]
//                ])->value('email');
//            }
//
//            Mail::send('mail.billadd',compact('id'),function(Message $message) use($id,$useremail,$cc_email){
//                //发给谁
//                $message->to($useremail);
//                //抄送
//                if($cc_email){
//                    $message->cc($cc_email);
//                }
//                //主题
//                $message->subject("提单创建成功!");
//            });
            #----email end

            DB::table("assist")->update(['project_id'=>(int)$arr['project'],'status'=>2]);

            return $this->jsonSuccessData();
        }catch(\Exception $e){
            echo $e->getMessage();
            DB::rollBack();
        }

    }



    public function Status1($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$last_info,$bill_list){
        $re_manpower = $manpower;
        for($i=$first_week_count;$i<=$last_week_count;$i++){

            if($i == $first_week_count){
                if($first_info->remain == 0){
                    continue;
                }
                if($first_info->remain >= $manpower){
                    $bill_list['manpower'] = $manpower;

                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }

                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }

                    break;
                }else{
                    $bill_list['manpower'] = $first_info->remain;
                    $re_manpower = $manpower - $first_info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $first_info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }

            if($i>$first_week_count && $i<$last_week_count ){
                $info =  DB::table("humtableinit2")->where([
                    ['year','=',$s_year],
                    ['ttid','=',$ttype],
                    ['week_count', $i]
                ])->first();

                if($info->remain == 0){
                    continue;
                }

                if( $info->remain >= $re_manpower ){
                    $bill_list['manpower'] = $re_manpower;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $re_manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                    break;
                }else{
                    $bill_list['manpower'] = $info->remain;
                    $re_manpower = $re_manpower - $info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }

            if($i == $last_week_count){
                if($last_info->remain == 0){
                    continue;
                }
                if($last_info->remain >= $re_manpower){
                    $bill_list['manpower'] = $re_manpower;

                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $re_manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                    break;
                }else{
                    $bill_list['manpower'] = $last_info->remain;
                    $re_manpower = $manpower - $last_info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败,提交提交有误!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $last_info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }
        } //end_for
    }


    public function Status2($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$bill_list){
        $re_manpower = $manpower;
        for($i=$first_week_count;$i<=$last_week_count;$i++){

            if($i == $first_week_count){
                if($first_info->remain == 0){
                    continue;
                }
                $bill_list['manpower'] = $first_info->remain;
                $re_manpower = $manpower - $first_info->remain;
                if(!DB::table("bill_slave")->insert($bill_list)){
                    throw new \Exception('bill_slave入库失败!');
                }
                if( !DB::table("humtableinit2")->where([
                    ['week_count', $i],
                    ['ttid','=',$ttype]
                ])->update(['remain'=>0]) ){
                    throw new \Exception("humtableinit2数据更新失败");
                    return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                }
            }

            if($i>$first_week_count && $i<$last_week_count ){
                $info =  DB::table("humtableinit2")->where([
                    ['year','=',$s_year],
                    ['ttid','=',$ttype],
                    ['week_count', $i]
                ])->first();

                if($info->remain == 0){
                    continue;
                }
                $bill_list['manpower'] = $info->remain;
                $re_manpower = $re_manpower - $info->remain;
                if(!DB::table("bill_slave")->insert($bill_list)){
                    throw new \Exception('bill_slave入库失败!');
                }
                if(!DB::table("humtableinit2")->where([
                    ['week_count', $i],
                    ['ttid','=',$ttype]
                ])->update(['remain'=>0])){
                    throw new \Exception("humtableinit2数据更新失败");
                    return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                }
            }

            if($i == $last_week_count){
                $bill_list['manpower'] = $re_manpower;
                if(!DB::table("bill_slave")->insert($bill_list)){
                    throw new \Exception('bill_slave入库失败,提交提交有误!');
                }
                if(!DB::table("humtableinit2")->where([
                    ['week_count', $i],
                    ['ttid','=',$ttype]
                ])->decrement('remain', $re_manpower)){
                    throw new \Exception("humtableinit2数据更新失败");
                    return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                }
            }

        } //end_for
    }

    public function Status3($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$last_info,$arr,$bill_list){
//减去加班人力
        $re_manpower = $manpower - $arr['overManpower'];

        for($i=$first_week_count;$i<=$last_week_count;$i++){

            if($i == $first_week_count){
                if($first_info->remain == 0){
                    continue;
                }
                $bill_list['manpower'] = $first_info->remain;
                $re_manpower = $re_manpower - $first_info->remain;
                if(!DB::table("bill_slave")->insert($bill_list)){
                    throw new \Exception('bill_slave入库失败!');
                }
                if( !DB::table("humtableinit2")->where([
                    ['week_count', $i],
                    ['ttid','=',$ttype]
                ])->update(['remain'=>0]) ){
                    throw new \Exception("humtableinit2数据更新失败");
                    return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                }
            }

            if($i>$first_week_count && $i<$last_week_count ){
                $info =  DB::table("humtableinit2")->where([
                    ['year','=',$s_year],
                    ['ttid','=',$ttype],
                    ['week_count', $i]
                ])->first();

                if($info->remain == 0){
                    continue;
                }

                if( $info->remain >= $re_manpower ){
                    $bill_list['manpower'] = $re_manpower;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $re_manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                    break;
                }else{
                    $bill_list['manpower'] = $info->remain;
                    $re_manpower = $re_manpower - $info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }

            if($i == $last_week_count){
                if($last_info->remain == 0){
                    continue;
                }
                if($last_info->remain >= $re_manpower){
                    $bill_list['manpower'] = $re_manpower;

                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $re_manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                    break;
                }else{
                    $bill_list['manpower'] = $last_info->remain;
                    $re_manpower = $manpower - $last_info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败,提交提交有误!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $last_info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }
        }
    }


    public function Status4($manpower,$first_week_count,$last_week_count,$first_info,$ttype,$s_year,$last_info,$bill_list){
        $re_manpower = $manpower;
        for($i=$first_week_count;$i<=$last_week_count;$i++){

            if($i == $first_week_count){
                if($first_info->remain == 0){
                    continue;
                }
                if($first_info->remain >= $manpower){
                    $bill_list['manpower'] = $manpower;

                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }

                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }

                    break;
                }else{
                    $bill_list['manpower'] = $first_info->remain;
                    $re_manpower = $manpower - $first_info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $first_info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }

            if($i>$first_week_count && $i<$last_week_count ){
                $info =  DB::table("humtableinit2")->where([
                    ['year','=',$s_year],
                    ['ttid','=',$ttype],
                    ['week_count', $i]
                ])->first();

                if($info->remain == 0){
                    continue;
                }

                if( $info->remain >= $re_manpower ){
                    $bill_list['manpower'] = $re_manpower;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $re_manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                    break;
                }else{
                    $bill_list['manpower'] = $info->remain;
                    $re_manpower = $re_manpower - $info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }

            if($i == $last_week_count){
                if($last_info->remain == 0){
                    continue;
                }
                if($last_info->remain >= $re_manpower){
                    $bill_list['manpower'] = $re_manpower;

                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $re_manpower)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                    break;
                }else{
                    $bill_list['manpower'] = $last_info->remain;
                    $re_manpower = $manpower - $last_info->remain;
                    if(!DB::table("bill_slave")->insert($bill_list)){
                        throw new \Exception('bill_slave入库失败,提交提交有误!');
                    }
                    if(!DB::table("humtableinit2")->where([
                        ['week_count', $i],
                        ['ttid','=',$ttype]
                    ])->decrement('remain', $last_info->remain)){
                        throw new \Exception("humtableinit2数据更新失败");
                        return ['status'=>1000, 'msg'=>'humtableinit2数据更新失败'];
                    }
                }
            }
        } //end_for
    }


    //状态修改--发送邮件
    public function changeStatus(Request $request,int $id){

        $billModel = Bill::find($id);

        $email = DB::table("users")->where("id",'=',$billModel->uid)->value('email');
        $billModel->is_use  = 2;
        if( $billModel->save()){
            //发送邮件
            Mail::send('mail.changestatus',compact('billModel'),function(Message $message) use($email){
                //发给谁
                $message->to($email);
                //主题
                $message->subject('提单提交成功!');
            });

            //方法二:
//
//            $arr = array(
//                'email_addr' =>$email,
//                'content' => '提单提交成功!',
//                'created_at' => date("y-m-d H:i:s",time())
//            );
//
//            DB::table("emails")->insert($arr);

            return redirect('admin/bill/index')->with('success','提交成功!');
        }
    }


    //根据测试类型获取测试内容
    public function getTypeContentById(Request $request){
        $ttype_id = $request->id;
        $data = DB::table("protestcontents")->where('ttype_id',$ttype_id)->get()->toArray();
        return ['status'=>0,'data'=>$data];
    }

    //判断是否是节假日
    public function IsHoliday(Request $request){
        if($request->isMethod('post')){
            $data = $request->only(['time']);
            if(DB::table("holiday")->where('day', $data)->first()){
                return ['status'=>1000,'msg'=>'节假日不可选'];
            }
            return ['status'=>0,'msg'=>'可以选择'];
        }
    }


    /**
     * @action 根据选中时间 查询人力
     * @param  Request  $request
     * @return array
     */
    public function humanIsEnough(Request $request){
        #接收数据 @开始时间 测试类型 工作时长 人力
        $data = $request->only(['time','ttid','workday',"manpower"]);

        $year = substr($data['time'],0,4);  //年
        $month = substr($data['time'],5,2); //月
        $day = substr($data['time'],8,2); //日
        $ttid = $data['ttid'];
        $workday = $data['workday'];
        $manpower = $data['manpower'];

        //先查找当前时间段(**提交的时间所在时间段)
        $first_query_data = DB::table("humtableinit2")->where([
            ['year','=',$year],
            ['month','=',$month],
            ['begin','<=',$day],
            ['end','>=',$day],
            ['ttid','=',$ttid]
        ])->first();


        //人力资源表没有填写直接返回
        if($first_query_data->origin==="" ||$first_query_data->remain === "" ){
            return $this->jsonData(ApiErrDesc::ERR_PARAMS1[0],ApiErrDesc::ERR_PARAMS[1]);
        }


        //工作日统计
        $day_count = 0;
        #剩余人力
        $manpower_count = $first_query_data->remain;
        #当前时间段最后已填 y-m-d(end)
        $first_query_data_lastDay = $first_query_data->year.'-'.$first_query_data->month.'-'.$first_query_data->end;
        #遍历 第一时间段(begin ~ end)
        for($i=strtotime($data['time']);$i<=strtotime($first_query_data_lastDay);$i+=86400){
            $day_count++;
        }
        $week_count = $first_query_data->week_count;  //全年第几个工作日时间段

        //第一个时间段(工作日) 小于 需要的工作时间
        if($day_count<$workday){
            //array('全年第几周', '人力和')
            $return_data = $this->findNext($workday, $day_count, $year, $ttid, $week_count+1,$manpower_count);

            if(!is_array($return_data)){
                return $this->jsonData(ApiErrDesc::ERR_PARAMS[0],ApiErrDesc::ERR_PARAMS1[1]);
            }
           #人力和 小于 需要的人力  人力不足
           if($return_data['manpower'] < $manpower){
               //array('全年第几周', '人力和')
               return [ 'status'=>1000,'msg'=>'人力不足','data'=>[$return_data['week'],$return_data['manpower']] ];
           }

        }else{ //第一周的工作时长 大于等于 需要的时长

            #第一周的剩余人力  小于 需要的人力
            if($first_query_data->remain < $manpower){
                //array('全年第几周','剩余人力')
                return ['status'=>1000,'msg'=>'人力不足','data'=>[$week_count,$first_query_data->remain]];
            }

        }
        //返回 推算的结算时间
        return ['status'=>0, 'msg'=>'success','data'=>$this->getEndTime($data['time'],$workday)];
    }


    /**
     * 查找下一个工作日(周)段
     * @param $workday
     * @param $day_count
     * @param $year
     * @param $ttid
     * @param $week_count
     * @param $manpower_count
     * @return array|int  全年第几周| 人力和
     */
    public function findNext($workday, $day_count, $year,$ttid, $week_count,$manpower_count){
            Static $week = 0;
            Static $manpower =0;
            $next_query_data = DB::table("humtableinit2")->where([
                ['year','=',$year],
                ['ttid','=',$ttid],
                ['week_count','=',$week_count]
            ])->first();
            $i_start = strtotime($next_query_data->year.'-'.$next_query_data->month.'-'.$next_query_data->begin);
            $i_end = strtotime($next_query_data->year.'-'.$next_query_data->month.'-'.$next_query_data->end);
            //人力资源表没有填写直接返回
            if($next_query_data->origin==="" ||$next_query_data->remain === "" ){
                return 1000;
            }
            $manpower_count += $next_query_data->remain; //人力
            $manpower = $manpower_count;
            $week = $next_query_data->week_count;
            for($i=$i_start;$i<=$i_end;$i+=86400){
                $day_count ++ ;
            }

            if($day_count<$workday){
                $this->findNext($workday,$day_count,$year, $ttid, $week_count+1,$manpower_count);
            }
            return compact('week','manpower');
    }

    /**
     * 时间顺延 (可顺延下一个工作日周)
     * @param  Request  $request
     * @return array
     */
    public function timeDelay(Request $request){
        # 开始时间  测试类型  工作时长 需要人力 全年第几周  工作时长所在时间段人力和
        $postData = $request->except(['_token']);
        $year = substr($postData['time'],0,4);
        $month = substr($postData['time'],5,2);
        $day = substr($postData['time'],8,2);
        #测试类型
        $ttid = $postData['ttid'];
        #全年第几周
        $week_count = $postData['week_count'];


        #顺延的下一周信息
        $first_ = DB::table("humtableinit2")->where([
            ['year','=',$year],
            ['ttid','=',$ttid],
            ['week_count','=',$week_count+1]
        ])->first();

        if($first_){
            if($first_->remain === ''){
                return ['status'=>1000,'msg'=>'vpm没有填写人力,无法顺延'];
            }else if($first_->remain === 0){
                return  ['status'=>1000, 'msg'=>'下一个工作日时间段的人力已消耗,无法延续，请线下沟通'];
            }

           if( ($postData['manpower_'] + $first_->remain)< $postData['manpower']){
               return ['status'=>1000,'msg'=>'顺延下一个时间段,人力依旧不足,请线下沟通'];
           }

        //顺延到那一天(默认下一时间段第一天)
        $return_data['time'] = $first_->year.'-'.$first_->month.'-'.$first_->begin;

        //返回 预设的 结束时间
        return ['status'=>0,'msg'=>'ok','data'=>$return_data];

        }else{
            return ['status'=>1000,'msg'=>'暂时无法顺延到下一年'];
        }


    }

    /**
     * 加班安排  （当前时间+实际工作时长  中间的一个双休日加班  最多可加班人数是上周人力的60%）
     * @param  Request  $request
     * @return array
     */
    public function overTime(Request $request){
        //接收数据 time日期 ttid测试类型 workday工作时长 manpower人力
        $postData = $request->except(['_token']);
        $startTime = $postData['time'];
        $workday = $postData['workday'];
        $year = substr($startTime,0,4);
        $month = substr($startTime,5,2);
        $day = substr($startTime,8,2);
        $ttid = $postData['ttid'];
        $manpower = $postData['manpower'];
        //推算截止时间
        $endTime = $this->getEndTime($startTime, $workday);
        $end_year = substr($endTime,0,4);
        $end_month = substr($endTime,5,2);
        $end_day = substr($endTime,8,2);

        #当前时间段的信息
        $first_data = DB::table("humtableinit2")->where([
            ['year','=',$year],
            ['month','=',$month],
            ['begin','<=',$day],
            ['end','>=',$day],
            ['ttid','=',$ttid]
        ])->first();

        #全年第几周
        $week_count = $first_data->week_count;
        if($week_count <= 1){
            return ['status'=>1000,'msg'=>'无法找到上一年的数据,请线下沟通'];
        }
        //上一周的信息
        $mostManpower = DB::table("humtableinit2")->where([
            ['year','=',$year],
            ['month','=',$month],
            ['ttid','=',$ttid],
            ['week_count', $week_count-1]
        ])->value('origin');

        if($mostManpower == ''){
            return ['status'=>1000, 'msg'=>'上周人力数据有误,无法加班,线下沟通'];
        }

        //最多加班人数
        $mostManpower = intval(0.6 * $mostManpower);

        $last_data = DB::table("humtableinit2")->where([
            ['year','=',$end_year],
            ['month','=',$end_month],
            ['begin','<=',$end_day],
            ['end','>=',$end_day],
            ['ttid','=',$ttid]
        ])->first();
        $last_week_count = $last_data->week_count;
        //统计人力
        $count_manpower = (int)$first_data->remain + (int)$last_data->remain;
        for($i=$week_count+1;$i<$last_week_count; $i++){
            $count_manpower+= DB::table("humtableinit2")->where([
                ['year','=',$end_year],
                ['ttid','=',$ttid],
                ['week_count', $i]
            ])->value('remain');
        }

        if( ($count_manpower+$mostManpower) < $manpower){
            return ['status'=>1000,'msg'=>'人力不够,无法提交,线下沟通'];
        }

        $overManpower = $manpower - $count_manpower; //加班人数

        return ['status'=>0, 'msg'=>'OK','data'=>compact('endTime','mostManpower','overManpower')];
    }


    /**
     * 自定义
     * @param  Request  $request
     * @return array
     */
    public function custom(Request $request){
        $postData = $request->except(['_token']);
        $startTime = $postData['startTime'];
        $endTime = $postData['endTime'];
        $workday = $postData['workday'];
        $manpower = $postData['manpower'];
        $ttid = $postData['ttid'];

        $s_year = substr($startTime,0,4);
        $s_month = substr($startTime,5,2);
        $s_day = substr($startTime,8,2);

        $e_year = substr($endTime,0,4);
        $e_month = substr($endTime,5,2);
        $e_day = substr($endTime,8,2);

        $first_data = DB::table("humtableinit2")->where([
            ['year','=',$s_year],
            ['month','=',$s_month],
            ['begin','<=',$s_day],
            ['end','>=',$s_day],
            ['ttid','=',$ttid]
        ])->first();

        $last_data = DB::table("humtableinit2")->where([
            ['year','=',$e_year],
            ['month','=',$e_month],
            ['begin','<=',$e_day],
            ['end','>=',$e_day],
            ['ttid','=',$ttid]
        ])->first();

        $manpower_sum = (int)$first_data->remain + (int)$last_data->remain;
        for($i=$first_data->week_count+1;$i<$last_data->week_count;$i++){
            $re = DB::table("humtableinit2")->where([
                ['ttid',$ttid],
                ['week_count',$i],
            ])->value('remain');
            if(!empty($re)){
                $manpower_sum += $re;
            }
        }

        if($manpower_sum < $manpower){
            return ['status'=>1000,'msg'=>'人力不足,无法提交'];
        }
        return ['status'=>0, 'msg'=>'OK'];
    }

    /**
     * 推算结束时间
     * @param $endTime
     * @param $workday
     */
    public function getEndTime($startTime, $workday){
        if($startTime == '' || $workday == ''){
            return null;
        }
        //获取当前时间后面的节假日
        $holidays = DB::table("holiday")->where("day",">=",$startTime)->get()->toArray();
        $count = 0;
        foreach($holidays as $k=>$v){
            if( strtotime($startTime)+86400*($workday+$count-1) < strtotime($v->day) ){
                return  date('Y-m-d',strtotime($startTime)+86400*($workday+$count-1));
            }else {
                $count++;;
            }
        }

    }



    /**
     *
     * 自动化提单 根据开始时间和工作时长 推算日期
     * @param Request $request
     * @return array
     */
    public function getWorkDay(Request $request){
        $data = $request->only(['starttime','workday']);
        $starttime = $data['starttime'];
        $workday = $data['workday'];

        if(DB::table("holiday")->where('day', $starttime)->first()){
            return ['status'=>1000,'msg'=>'节假日不可选'];
        }

        if($rdata = $this->getEndTime($starttime,$workday)){
            return ['status'=>0,'data'=> $rdata ];
        }

        //获取当前时间后面的节假日
//        $holidays = DB::table("holiday")->where("day",">=",$starttime)->get()->toArray();
//
//        $count = 0;
//        foreach($holidays as $k=>$v){
//
//            if( strtotime($starttime)+86400*($workday+$count-1) < strtotime($v->day) ){
//                return ['status'=>0,'data'=> date('Y-m-d',strtotime($starttime)+86400*($workday+$count-1))];
//            }else {
//                $count++;;
//            }
//        }
        return ['status'=>1000,'msg'=>'无法安排'];
    }

    //自定义提单 推算工作时长
    public function getCustomeWorkDay(Request $request){
        $postData =  $request->except(['_token']);
        $startTime = $postData['startTime'];
        $endTime = $postData['endTime'];

        $num = Db::table("holiday")->where([
            ['day','>', $startTime],
            ['day','<', $endTime],
        ])->count();

        if($s = strtotime($startTime) >= $e =strtotime($endTime)){
            return ['status'=>1000, 'msg'=>'时间选择错误,开始时间不该晚于或等于结束时间'];
        }

        $count = 0;
        for($i=strtotime($startTime);$i<=strtotime($endTime);$i+=86400){
            $count++;
        }
        return ['status'=>0, 'data'=>$count-$num];
    }



    //提单结算显示页面
    public function settle(Request $request){
        $postData = $request->input();

        $projects = DB::table("projects")
            ->select("id","name")
            ->where("deleted_at",'=',null)
            ->get()->toArray();
        $departments = DB::table("departments")->get();
        $username = Auth::guard('user')->user()->username;

        $bills = Db::table("bill as b")
            ->select("b.*","u.username as uname","p.name as pname","pt.name as ptname")
            ->leftJoin("users as u",'b.uid','=','u.id')
            ->leftJoin('projects as  p','b.project_id','=','p.id')
            ->leftJoin("protesttypes as pt",'b.ttype','=','pt.id')
            ->get();

        return view('admin.bill.settle',compact('projects','departments','username','bills','bills'));
    }

    public function settlesearch(Request $request){
        $postData = $request->only(['ttype','project']);
        $ttype =  $postData['ttype'];
        $project =  $postData['project'];
        $bills = Db::table("bill as b")
            ->select("b.*","u.username as uname","p.name as pname","pt.name as ptname")
            ->leftJoin("users as u",'b.uid','=','u.id')
            ->leftJoin('projects as  p','b.project_id','=','p.id')
            ->leftJoin("protesttypes as pt",'b.ttype','=','pt.id');

        if($ttype??0){
            $sql = ["b.ttype",'=',$ttype];
            $bills->where([
                $sql,
            ]);
        }
        if($project??0){
            $sql1 = ["b.project_id",'=',$project];
            $bills->where([
                $sql1,
            ]);
        }
        $data =  $bills->get()->toArray();
        return ['status'=>0,'data'=>$data];
    }


    public function settledo(Request $request){
        $postData = $request->only(['id','settleManpower']);
        $id = $postData['id'];
        $settleManpower = $postData['settleManpower'];

        $model = Bill::find($id)->update(['settle_manpower'=>$settleManpower]);
        return ['status'=>0, 'msg'=>'结算人力提交成功!'];
    }

    //提单结算页面
    public function statical(){
        return view("admin.bill.statical");
    }


    /**
     * 提单结算汇总显示
     * @param  Request  $request
     * @return array
     */
    public function  staticalShow(Request $request){
        $postData = $request->only(['staType']);

        if($postData['staType'] == 1){
            $projects = DB::table('projects')
                ->select("id","name","dev_budget","os_budget","ota_budget")
                ->where("deleted_at",'=',null)
                ->get()->toArray();

            $bills = DB::table('bill')
//                ->where([
//                    ['is_use','=', 2]
//                ])
                ->get()->toArray();

            $pcrs = DB::table("pcr")->select('id','project_id','cost')->get()->toArray();


            $pcrs_new = array();
            foreach($pcrs as $pcr){
                $pcrs_new[$pcr->project_id]['sum'] = ($pcrs_new[$pcr->project_id]['sum']??0) + $pcr->cost;
            }

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
                $pcr_cost = 0;
                if(array_key_exists($val->id, $pcrs_new)){
                    $pcr_cost = (int)$pcrs_new[$val->id]['sum'];
                }
                $pro_sum = $val->dev_budget + $val->os_budget + $val->ota_budget + $pcr_cost; //预算 + pcr

                if(empty($bill_new)){
                    $data[$val->id]['unused'] = $pro_sum;
                }else{
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

        //结算
        if( $postData['staType'] == 2 ){
            $projects = DB::table('projects')
                ->select("id","name","dev_budget","os_budget","ota_budget")
                ->where("deleted_at",'=',null)
                ->get()->toArray();

            $bills = DB::table('bill')
//                ->where([
//                    ['is_use','=', 2]
//                ])
                ->get()->toArray();

            $pcrs = DB::table("pcr")->select('id','project_id','cost')->get()->toArray();


            $pcrs_new = array();
            foreach($pcrs as $pcr){
                $pcrs_new[$pcr->project_id]['sum'] = ($pcrs_new[$pcr->project_id]['sum']??0) + $pcr->cost;
            }

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
                $pcr_cost = 0;
                if(array_key_exists($val->id, $pcrs_new)){
                    $pcr_cost = (int)$pcrs_new[$val->id]['sum'];
                }
                $pro_sum = $val->dev_budget + $val->os_budget + $val->ota_budget + $pcr_cost; //预算 + pcr

                if(empty($bill_new)){
                    $data[$val->id]['unused'] = $pro_sum;
                }else{
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



    }


    /**
     * 删除 已保存 状体的提单
     * @param  int  $id
     * @return array
     */
    public function del(int $id){
        if( DB::table("bill")->where([
            'id'=>$id
        ])->update(['is_delete'=>2]) ){
            return ['status'=>0, 'msg'=>'删除成功!'];
        }
    }




}
