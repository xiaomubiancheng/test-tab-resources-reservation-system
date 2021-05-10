<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Project;
use App\Http\Models\Vpm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public $engteam = ['1'=>'In House','2'=>'JDM','3'=>'ODM','4'=>'Design House','5'=>'Commercial'];
    public $format = ['1'=>'Tablet','2'=>'Smart Home','3'=>'AR/VR'];
    /**
     * 项目列表页面显示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('projects')
                ->select("projects.*",'vpms.name as vpmname')
                ->leftJoin('vpms','projects.vpm','vpms.id')
                ->where("projects.deleted_at",'=', null)
                ->get();
        foreach($data as $key=>$list){
            $data[$key]->engteam= $this->engteam[$list->engteam];
            $data[$key]->format=  $this->format[$list->format];
        }

        return view('admin.project.index',compact('data'));
    }

    /**
     * 项目添加页面显示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vpms = Vpm::get()->toArray();
        return view('admin.project.add',compact('vpms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input_data = $request->except(['_token']);
        $this->validate($request,[
            'name' => 'required',
            'pdname' => 'required',
            'mname' => 'required',
            'vpm' => 'required',
            'devtime' => 'required',
            'ostime' => 'required',
            'otatime' => 'required',
            'engteam' => 'required',
            'format' => 'required',
            'dev_budget' => 'required',
            'os_budget' => 'required',
            'ota_budget' => 'required',
        ]);
        Project::create($input_data);
        return redirect(route('admin.project.index'))->with('success','新建项目成功!');

    }

    /**
     * 项目详情展示页面   展示提单
     * @param  int  $id 项目id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,int $id)
    {
        $bills = DB::table("bill")
            ->select("bill.*","projects.name","pro.name as proname")
            ->leftJoin('projects','bill.project_id','=','projects.id')
            ->leftJoin('protesttypes as pro', 'bill.ttype','=', 'pro.id')
            ->where('project_id','=', $id)
            ->get()->toArray();
        return view("admin.project.show",compact("bills"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
//        $data = DB::table('projects')
//            ->select("projects.*",'vpms.name as vpmname')
//            ->leftJoin('vpms','projects.vpm','vpms.id')
//            ->where('projects.id',$id)
//            ->get();
//
//        $data = $data[0];
//        $data->engteam= $this->engteam[$data->engteam];
//        $data->format=  $this->format[$data->format];

        $data =Project::find($id);
        $vpms = Vpm::all()->toArray();
        return view('admin.project.edit',compact('data','vpms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->except(['_token','_method']);
        $this->validate($request,[
            'name' => 'required|unique:projects,name,'.$id.',id',
            'pdname' => 'required',
            'mname' => 'required',
            'vpm' => 'required',
            'devtime' => 'required',
            'ostime' => 'required',
            'otatime' => 'required',
            'engteam' => 'required',
            'format' => 'required',
        ]);

        if(!Project::where([['id','=',$id]])->update($data)){
            return redirect()->back();
        }

        return redirect(route('admin.project.index'))->with('success','项目信息修改成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Project::find($id)->delete();
        return ['status'=>0,'msg'=>'删除成功!'];
    }



}
