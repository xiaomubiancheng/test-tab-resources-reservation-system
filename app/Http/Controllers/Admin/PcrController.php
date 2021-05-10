<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPcrRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcrs = DB::table("pcr")
            ->select("pcr.*", "projects.name as project_name")
            ->leftJoin('projects',"pcr.project_id",'=','projects.id')
            ->get();
        return view('admin.pcr.index',compact('pcrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table("projects")->select('id','name')->get();
        return view('admin.pcr.add',compact('projects'));
    }

    //上传图片 提交表单
    public function upload(AddPcrRequest $request){

        dd($request->all());
    }

    //异步上传图片
    public function uppic(Request $request){
        if($request->hasFile('pic')){
            $path = $request->file('pic')->store('','pic');
            $pic = '/uploads/pcr/'.$path;
        }
        return ['status'=>0, 'url'=>$pic];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->except(['_token']);

        if(!DB::table("pcr")->insert($postData))
            return ['status'=>1000,'msg'=>'添加失败!'];

        return ['status'=>0, 'msg'=>'添加成功!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
