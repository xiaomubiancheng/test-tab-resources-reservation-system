<?php

namespace App\Http\Models;

use App\Http\Models\Base;

class Role extends Base
{
    //角色和权限 多对多
    public function nodes(){
        /**
         * params 关联模型
         * params 中间表的表名(没有前缀)
         * params 本模型对应的外键ID
         * params 关联模型对应的外键ID
         */
        return $this->belongsToMany(Node::class,'role_node','role_id','node_id');
    }
}
