<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        //获取用户对应的权限
        $auth = session('admin.auth');
        return view('admin.index.index',(new Node)->menuTreeData($auth));
    }

    public function welcome(){
        return view('admin.index.welcome');
    }


}
