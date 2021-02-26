<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
         return view("admin.login.login");
    }

    //登录处理
    public function login(Request $request)
    {
        //接受数据
       $postData = $request->only('username','password');
       //数据过滤
       $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
       ],[
           'username.required'=>"账号不能为空",
           'password.required'=>"密码不能为空"
       ]);

       //身份验证
       $re = Auth::guard('user')->attempt([
           'username' => $postData['username'],
           'password' => $postData['password']
       ]);

       if($re) {

           if(config('rbac.super') != $postData['username']){
              $userModel = auth::guard('user')->user();
//              $roleModel = $userModel->roles();
               //方法一:多个角色循环取   todo....
              $ownRoles = $userModel->roles()->pluck('id')->toArray();
              $nodeArr = Role::find($ownRoles[0])->nodes()->pluck('route_name','id')->toArray();
//              $nodeArr = $roleModel->nodes()->pluck('route_name','id')->toArray();
              session(['admin.auth'=>$nodeArr]);
           }else{
               session(['admin.auth'=>true]);
           }

           return redirect(url('admin/index/index'));
       }else{
           return redirect(url('admin/login'))->withErrors(['error'=>'账号或密码错误']);
       }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect(url('admin/login'));
    }
}
