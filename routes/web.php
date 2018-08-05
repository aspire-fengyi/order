<?php

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
//后台路由组

Route::group(['prefix'=>'admin'],function(){
    //首页路由
    Route::get('/','Admin\IndexController@index')->name('admin.index');

//后台添加用户路由`
    Route::get('/users/create','Admin\IndexController@create')->name('admin.users.create');


});



