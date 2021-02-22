<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.login.login');
});


//登录
Route::match(['get','post'],'/admin/login','Admin\LoginController@login');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'CheckLogin'],function (){
    Route::get('logout','LoginController@logout');
    //首页
    Route::get('index/index','IndexController@index');
});


