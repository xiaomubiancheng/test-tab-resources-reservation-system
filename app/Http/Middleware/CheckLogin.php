<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //用户是否登录检查
        if(!Auth::guard('user')->check()){
            return redirect(url('admin/login'))->withErrors(['error'=>"非法登录"]);
        }

        //访问的权限
        $auths = is_array(session('admin.auth'))?array_filter(session('admin.auth')):[];
        $auths = array_merge($auths,config('rbac.allow_route'));

        //当前访问的路由
        $currentRoute = $request->route()->getName();

        //权限判断
        if(auth::guard('user')->user()->username != config('rbac.super') && !in_array($currentRoute,$auths) ){
            exit('你没有权限');
        }

        return $next($request);
    }
}
