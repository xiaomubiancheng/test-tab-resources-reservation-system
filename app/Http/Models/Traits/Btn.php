<?php
namespace App\Http\Models\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

trait Btn{
    public $auth = [];
    public function __construct()
    {
        $auths = is_array(session('admin.auth'))?array_filter(session('admin.auth')):[];
        $auths = array_merge($auths,config('rbac.allow_route'));
        $this->auth = $auths;
    }


    public function addShowBtn(string $route){
        if(auth::guard('user')->user()->username !=config('rbac.super') && !in_array($route,$this->auth)){
            return '';
        }
        return '<a href="'.route($route,$this).'"><button type="button" class="btn btn-outline btn-default"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i>添加用户</button></a>';
    }




    public function assignRoleBtn(string $route){

        if(auth::guard('user')->user()->username !=config('rbac.super') && !in_array($route,$this->auth)){
            return '';
        }
        return '<a href="'.route($route,$this).'" class="label label-secondary radius">修改</a>';
    }
}
