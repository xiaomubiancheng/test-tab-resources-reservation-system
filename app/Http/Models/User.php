<?php

namespace App\Http\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Models\Traits\Btn;

class User extends Base  implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Btn;
    //软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //实现接口
    use \Illuminate\Auth\Authenticatable;

    //声明表名
    protected $table = 'users';

    //拒绝添加的字段
    protected $guarded = [];

    public function roles(){
        return $this->belongsToMany(Role::class,'user_role','user_id','role_id');
    }

}
