<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Node;
use Illuminate\Http\Request;
use App\Http\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::withTrashed()->get();
        return view('admin.role.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name']);
        $this->validate($request,[
            'name'=>'required|unique:roles,name',
        ]);
        if(!Role::create($data)){
            return ['status'=>1000,'msg'=>'角色添加失败!'];
        }
        return ['status'=>0,'msg'=>'角色添加成功!'];

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
     *修改页面展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Role::find($id);
        return view('admin.role.edit',compact('model'));
    }

    /**
     *角色修改执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        try{
            $this->validate($request,[
                'name' => 'required|unique:roles,name'.$id.',id'
            ]);
        }catch(\Exception $e){
            return ['status'=>1000,'msg'=>'验证不通过'];
        }
        Role::where('id',$id)->update($request->only(['name']));
        return ['status'=>0, 'msg'=>'修改用户成功'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Role::find($id)->delete();
        return ['status'=>0, '角色删除成功!'];
    }

    //还原
    public function restore(int $id){
        Role::onlyTrashed()->where('id',$id)->restore();
        return redirect(route('admin.role.index'))->with('success','角色还原成功');
    }

    //分配权限页面显示
    public function node(Role $role){
        $node = new Node;
        //读取所有权限
        $nodeAll = $node->getAllList();
        //当前角色所有权限
        $ownNodes =  $role->nodes()->pluck('id')->toArray();

        $pris = $node->getTreeArr($nodeAll);
        $children = $node->getTreeID($nodeAll);

        return view('admin.role.node',compact('role','children','pris','ownNodes'));
    }

    //权限分配执行
    public function nodeSave(Request $request, Role $role){
        //关联模型数据同步
        $role->nodes()->sync($request->get('ids'));
        return redirect(route('admin.role.node',$role));
    }
}
