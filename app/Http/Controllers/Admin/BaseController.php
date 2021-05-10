<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{

    //分页的页码数
    protected $pagesize = 20;

    public function __construct()
    {
        $this->pagesize = config('page.pagesize');
    }


}
