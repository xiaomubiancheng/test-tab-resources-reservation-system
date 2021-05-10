<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index(){

        $data = Redis::get("project");
        if($data){
            echo 'redis11';
            dd(Redis::get("project"));
        }else{
            $data = DB::table("protesttypes")->select('id','name')->get()->toJson();
            Redis::set("project", $data);
            echo 'DB';
            dd($data);
        }



        return view("admin.test.index");
    }

    public function test(){
       dd( Cache::get("key") );
    }
}
