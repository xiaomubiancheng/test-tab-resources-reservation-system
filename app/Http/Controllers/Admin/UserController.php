<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Role;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends BaseController
{
    //用户列表
    public function index(){
        $data = User::orderBy('id', 'desc')->get();
        $model = new User();
        return view('admin.user.index',compact('data','model'));
    }

    //显示添加用户页
    public function create(){
        return view('admin.user.add');
    }

    //添加用户处理
    public function store(Request $request){
        $post = $request->only(['username','truename','itcode','email','password']);

        $this->validate($request,[
           'username' => 'required',
           'truename' => 'required',
           'email'    => 'required'
        ]);
        $password = $post['password']??'123456';
        $post['password'] = bcrypt($password);
        $post['created_at'] = date("y-m-d",time());

//        DB::table("users")->insert($post);
        User::create($post);

        return redirect(route('admin.user.index'))->with('success','添加用户成功');
    }

    //删除用户
    public function del(int $id){
        User::find($id)->delete();
        return ['status'=>0,'msg'=>'删除成功'];
    }

    public function edit(int $id){
        $model = User::find($id);
        return view('admin.user.edit',compact('model'));
    }

    public function update(Request $request, int $id){
        $data = $request->only([
            'username',
            'truename',
            'itcode',
            'email',
            'password'
        ]);
        if(empty($data['itcode'])){
            unset($data['itcode']);
        }
        if(!empty($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }else{
           unset($data['password']);
        }

        $model = User::find($id)->update($data);
        return redirect(route('admin.user.index'))->with('success','用户信息修改成功');

    }

    //分配角色
    public function role(Request $request, User $user){
        if($request->isMethod('post')){
            $post = $this->validate($request,[
               'role_id' => 'required'
            ],['role_id.required'=>'必须选择']);

            $user->roles()->sync($request->get('role_id'));
            return redirect(route('admin.user.index'));
        }
        //读取所有的角色
        $roleAll = Role::all();
        //读取用户的角色
        $ownRoles = $user->roles()->pluck('id')->toArray();
        return view('admin.user.role',compact('user','roleAll','ownRoles'));
    }
}
