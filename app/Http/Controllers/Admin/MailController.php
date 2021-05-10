<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class MailController extends BaseController
{
    public function index(){
        return view('admin.mail.index');
    }
}
