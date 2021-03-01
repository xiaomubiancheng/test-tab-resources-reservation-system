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
    });

});


