<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * 提单列表显示页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bill.index');
    }



    /**
     * 提单添加页面显示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ttypes = DB::table("protesttypes")->pluck('name','id')->toArray();


        return view('admin.bill.add',compact('ttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        //获取当前时间后面的节假日
        $holidays = DB::table("holiday")->where("day",">=",$starttime)->get()->toArray();

        $count = 0;
        foreach($holidays as $k=>$v){

            if( strtotime($starttime)+86400*($workday+$count-1) < strtotime($v->day) ){
                return ['status'=>0,'data'=> date('Y-m-d',strtotime($starttime)+86400*($workday+$count-1))];
            }else {
                $count++;;
            }
        }
        return ['status'=>1000,'msg'=>'无法安排'];
    }

    //自定义提单推算时间
    public function getCustomeWorkDay(){

    }

    //提单结算显示页面
    public function settle(){
        return view('admin.bill.settle');
    }






}
