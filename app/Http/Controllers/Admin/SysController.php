<?php
namespace App\Http\Controllers\Admin;

class SysController extends BaseController{

    public function holiday(){
        return view('admin.system.holiday');
    }
}
