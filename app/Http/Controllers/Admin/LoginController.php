<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
     * 登录
     */
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            //接受数据
           $postData = $request->only('username','password','online');
           //数据过滤
           $this->validate($request,[
                'username' => 'required',
                'password' => 'required'
           ]);

           //身份验证
           $re = Auth::guard('user')->attempt([
               'username' => $postData['username'],
               'password' => $postData['password']
           ]);

           if($re) {
               return redirect(url('admin/index/index'));
           }else{
               return redirect(url('admin/login'))->withErrors(['tips'=>'账号或密码错误']);
           }
        }else{
            return view("admin.login.login");
        }

    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect(url('admin/login'));
    }
}
