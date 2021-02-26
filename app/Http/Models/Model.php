<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModel
{
    //软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //拒绝添加的字段
    protected $guarded = [];

//    public function treeLevel(array $data,int $pid = 0, string $html='--',int $level = 0){
    public function treeLevel(array $data,$pid = 0, $html='--',$level = 0){
        Static $arr = [];
        foreach($data as $k=>$val){
            if($pid == $val['pid']){
                $val['html'] = str_repeat($html,$level*2);
                $val['level'] = $level +1;
                $arr[] = $val;
                $this->treeLevel($data,$val['id'],$html,$val['level']);
            }
        }
        return $arr;
    }


    //获取层级ID
    public function getTreeID(array $data, $pid = 0){
        $arr = [];
        foreach ($data as $v){
            $arr[$v['pid']][] = $v['id'];
        }
        return $arr;
    }

    //获取层级数组
    public function getTreeArr(array $data,$pid =0){
        $arr = [];
        foreach($data as $k=>$v){
            $arr[$v['id']] = $v;
        }
        return $arr;
    }


}
