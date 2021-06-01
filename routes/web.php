<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //登录首页显示
    Route::get('login','LoginController@index')->name('admin.login');
    //登录处理
    Route::post('login','LoginController@login')->name('admin.login');
    //登出
    Route::get('logout','LoginController@logout')->name("admin.logout");

    Route::group(['middleware'=>['check.login'],'as'=>'admin.'],function(){

        //后台首页
        Route::get('index/index','IndexController@index')->name("index.index");
        //欢迎页
        Route::get("index/welcome",'IndexController@welcome')->name("index.welcome");

        //用户管理-----
        //用户列表
        Route::get('user/index','UserController@index')->name('user.index');
        //添加用户
        Route::get('user/add','UserController@create')->name('user.create');
        //添加用户处理
        Route::post('user/add','UserController@store')->name('user.store');
        //删除用户
        Route::delete("user/del/{id}","UserController@del")->name('user.del');
        //修改用户
        Route::get('user/edit/{id}',"UserController@edit")->name('user.edit');
        Route::put('user/edit/{id}',"UserController@update")->name('user.edit');
        //用户分配角色
        Route::match(['get','post'],'user/role/{user}','UserController@role')->name('user.role');

        //角色---------
        Route::resource('role','RoleController');
        //角色还原
        Route::get('role/restore/{id}',"RoleController@restore")->name('role.restore');
        //角色分配权限
        Route::get('role/node/{role}','RoleController@node')->name('role.node');
        Route::post('role/node/{role}','RoleController@nodeSave')->name('role.node');

        //节点(权限)------
        Route::resource('node','NodeController');

        //项目------
        Route::resource('project','ProjectController');

        //提单------------
        Route::get('bill/index','BillController@index')->name('bill.index');
        //添加提单
        Route::get('bill/add','BillController@create')->name('bill.create');
        //添加提单处理
        Route::post('bill/add','BillController@store')->name('bill.store');
        //添加页面已保存数据
        Route::post("bill/preserve",'BillController@preserve')->name('bill.preserve');
        Route::post("bill/preserveBatch",'BillController@preserveBatch')->name('bill.preserveBatch');
        #添加页面项目费用预览
        Route::get("bill/costPriview",'BillController@costPriview')->name('bill.costPriview');
        Route::get("bill/getStatus",'BillController@getStatus')->name('bill.getStatus');


        //删除提单
        Route::delete("bill/del/{id}","BillController@del")->name('bill.del');
        //修改提单
        Route::get('bill/edit/{id}',"BillController@edit")->name('bill.edit');
        Route::put('bill/edit/{id}',"BillController@update")->name('bill.edit');
        //修改提单状态
        Route::get('bill/changeStatus/{id}',"BillController@changeStatus")->name('bill.changeStatus');
        //提单结算页面
        Route::get('bill/settle','BillController@settle')->name('bill.settle');
        Route::post('bill/settlesearch','BillController@settlesearch')->name('bill.settlesearch');
        Route::get('bill/settledo', 'BillController@settledo')->name('bill.settledo');
        //统计
        Route::get("bill/statical", 'BillController@statical')->name('bill.statical');
        Route::post("bill/staticalShow", 'BillController@staticalShow')->name('bill.staticalShow');


        //获取测试内容
        Route::post('bill/tcontent','BillController@getTypeContentById')->name('bill.tcontent');
        //验证是否为节假日
        Route::post('bill/isholiday','BillController@IsHoliday')->name('bill.isholiday');
        //自动化提单推算时间
        Route::post('bill/gettime','BillController@getWorkDay')->name('bill.gettime');
        //自定义提单推算时间
        Route::post('bill/getcustomtime','BillController@getCustomeWorkDay')->name('bill.getcustomtime');

        //人力是否充足
        Route::post("bill/humanIsEnough","BillController@humanIsEnough")->name("bill.humanIsEnough");

        //时间顺延
        Route::post("bill/timedelay",'BillController@timeDelay')->name("bill.timedelay");
        //加班安排
        Route::post("bill/overtime",'BillController@overTime')->name("bill.overtime");
        //自定义
        Route::post("bill/custom",'BillController@custom')->name("bill.custom");



        //PCR-------------
        Route::resource('pcr','PcrController');
        Route::post("pcr/uppic","PcrController@uppic")->name("pcr.uppic");
        Route::post("pcr/store","PcrController@store")->name("pcr.store");
        Route::post("pcr/upload","PcrController@upload")->name("pcr.upload");


        //人力管理-------
        //人力管理显示页面
        Route::get('humanresource/index','HumanController@index')->name('humanresource.index');
        Route::get('hr/humanmange','HumanController@humanmange')->name('hr.humanmange');

        //
        Route::post("hr/info",'HumanController@info')->name("hr.info");

        Route::get('hr/tableinit','HumanController@tableInit')->name("hr.tableinit");
        Route::get('hr/tableinit1','HumanController@tableInit1')->name("hr.tableinit1");

        //人力修改
        Route::post('hr/update','HumanController@update')->name('hr.update');

        //人力预算预览页
        Route::get("hr/settlepriview","HumanController@settlepriview")->name('hr.settlepriview');
        Route::get('hr/initBudget',"HumanController@initBudget")->name('hr.initBudget');

        //人力
        Route::post("hr/humtable","HumanController@humtable")->name("hr.humtable");


        //系统管理
        //--节假日
        Route::get('sys/holiday',"SysController@holiday")->name('sys.holiday');




        //邮件

        //测试
        Route::get("test/index","TestController@index")->name("test.index");
        Route::get("test/test","TestController@test")->name("test.test");

        //邮件
        Route::get('test/mail',function(){
            \Mail::raw('测试', function(\Illuminate\Mail\Message $message){
                $message->to('');
                $message->subject('测试一下啊');
            });
        });
    });

});


