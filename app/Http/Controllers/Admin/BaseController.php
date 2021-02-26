<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //分页的页码数
    protected $pagesize = 20;

    public function __construct()
    {
        $this->pagesize = config('page.pagesize');
    }


}
