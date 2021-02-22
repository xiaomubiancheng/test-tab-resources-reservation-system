<?php

namespace App\Http\Models;

use App\Http\Models\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model  implements \Illuminate\Contracts\Auth\Authenticatable
{
    //实现接口
    use \Illuminate\Auth\Authenticatable;


    //声明表名
    protected $table = 'users';

//    protected $guarded = [];

}
