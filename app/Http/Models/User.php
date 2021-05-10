<?php

namespace App\Http\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Models\Traits\Btn;



class User extends Base
{
//    use Btn;

    //声明表名
    protected $table = 'users';


    public function roles(){
        return $this->belongsToMany(Role::class,'user_role','user_id','role_id');
    }

}
