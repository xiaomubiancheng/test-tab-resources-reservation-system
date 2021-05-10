<?php

namespace App\Http\Models;

use App\Http\Models\Base;

class Node extends Base
{
    //字段为null, 则设置为空字符串  修改和添加时生效
    public function setRouteNameAttribute($value){
        $this->attributes['route_name']=empty($value)?'':$value;
    }

    //访问器
    public function getMenuAttribute(){
        return $this->is_menu == '0' ? '<label class="radio-inline"><input type="radio" value="0"  name="is_menu" checked><label>否</label></label><label class="radio-inline"><input type="radio" value="1" name="is_menu" ><label>是</label></label>' : '<label class="radio-inline"><input type="radio" value="0" name="is_menu"><label>否</label></label><label class="radio-inline"><input type="radio" value="1" name="is_menu" checked><label>是</label></label>';
    }



    //获取全部的数据
    public function getAllList(){
        $data = self::orderBy('sort','asc')->get()->toArray();
        return $this->treeLevel($data);
    }

    //获取层级数据
    public function menuTreeData( $auth){
        $nodeAll = $this->getAllList();
        $menus = $this->getTreeArr($nodeAll);

        $query = Node::orderBY("sort",'asc')->where('is_menu','<>',0);

        if(is_array($auth)){
            $query->whereIn('id',array_keys($auth));
        }

        $menuData = $query->get()->toArray();
        $menuTreeData = $this->getTreeID($menuData);

        return compact('menus','menuTreeData');
    }
}
