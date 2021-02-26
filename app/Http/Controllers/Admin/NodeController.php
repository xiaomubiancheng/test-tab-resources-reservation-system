<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use App\Http\Models\Node;
use App\Http\Requests\AddNodeRequest;

class NodeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (new Node)->getAllList();
        return view('admin.node.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Node::where('pid',0)->get();
        return view('admin.node.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        try{
            $this->validate($request,[
                'name'=>'required',
            ]);
        }catch (\Exception $e){
            return ['status'=>1000,'msg'=>'权限名称验证不通过'];
        }
        if(Node::create($data)){
            return ['status'=>0,'msg'=>'添加权限成功'];
        }
        return ['status'=>1,'mag'=>'添加权限失败'];
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
    public function edit(int $id)
    {
        $model = Node::find($id);
        $lists = (new Node)->getAllList();
        return view('admin.node.edit',compact('model','lists'));
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
        $data = $request->only(['name','route_name','is_menu','pid']);

        $request->validate([
            'name' => 'required|unique:nodes,name,'.$id.',id',
        ]);

        Node::where([['id','=',$id]])->update($data);
        return redirect(route('admin.node.index'))->with('success','节点信息修改成功');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }


}
