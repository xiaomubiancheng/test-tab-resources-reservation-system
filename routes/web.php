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
//        Route::resource('bill','BillController');
        Route::get('bill/index','BillController@index')->name('bill.index');
        //添加提单
        Route::get('bill/add','BillController@create')->name('bill.create');
        //添加提单处理
        Route::post('bill/add','BillController@store')->name('bill.store');
        //删除提单
        Route::delete("bill/del/{id}","BillController@del")->name('bill.del');
        //修改提单
        Route::get('bill/edit/{id}',"BillController@edit")->name('bill.edit');
        Route::put('bill/edit/{id}',"BillController@update")->name('bill.edit');
        //提单结算页面
        Route::get('bill/settle','BillController@settle')->name('bill.settle');

        //获取测试内容
        Route::post('bill/tcontent','BillController@getTypeContentById')->name('bill.tcontent');
        //验证是否为节假日
        Route::post('bill/isholiday','BillController@IsHoliday')->name('bill.isholiday');
        //自动化提单推算时间
        Route::post('bill/gettime','BillController@getWorkDay')->name('bill.gettime');
        //自定义提单推算时间
        Route::post('bill/getcustomtime','BillController@getCustomeWorkDay')->name('bill.getcustomtime');


        //PCR-------------
        Route::resource('pcr','PcrController');


        //人力管理-------
        Route::get('humanresource/index','HumanController@index')->name('humanresource.index');

    });

});


