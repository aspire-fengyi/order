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

    //后台添加管理员路由
    Route::get('/users/admin_create','Admin\IndexController@admin_create')->name('admin.users.admin_create');

    //后台添加管理员出力路由
    Route::post('/users/admin_add','Admin\IndexController@admin_add')->name('admin.users.admin_add');

    //后台显示管理员路由
    Route::get('/users/admin_index','Admin\IndexController@admin_index')->name('admin.users.admin_index');

    //后台分级显示管理员路由
    Route::get('/users/admin_index_fenji','Admin\IndexController@admin_index_fenji')->name('admin.users.admin_index_fenji');

    //后台添加权限路由
    Route::get('/users/admin_leader_create','Admin\IndexController@admin_leader_create')->name('admin.users.admin_leader_create');

    //后台权限显示路由
    Route::get('/users/admin_leader_index','Admin\IndexController@admin_leader_index')->name('admin.users.admin_leader_index');

    //后台权限添加处理路由
    Route::post('/users/admin_leader_add','Admin\IndexController@admin_leader_add')->name('admin.users.admin_leader_add');





    //后台显示合作商路由
    Route::get('/users/index','Admin\UsersController@index')->name('admin.users.index');

    //后台添加合作商路由
    Route::get('/users/create','Admin\UsersController@create')->name('admin.users.create');

    //后台添加合作商处理路由
    Route::post('/users/add','Admin\UsersController@add')->name('admin.users.add');

});



