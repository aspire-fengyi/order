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

    /**
     *
     * 管理员路由
     *
     */

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

    //后台修改管理员信息路由
    Route::get('/users/admin_edit/{id}','Admin\IndexController@admin_edit')->name('admin.users.admin_edit');

    //后台修改管理员处理路由
    Route::post('/users/admin_update/{id}','Admin\IndexController@admin_update')->name('admin.users.admin_update');

    //后台删除管理员信息路由
    Route::get('/users/admin_delete/{id}','Admin\IndexController@admin_delete')->name('admin.users.admin_delete');


    /**
     *
     * 权限路由
     *
     */

    //后台添加权限路由
    Route::get('/users/admin_leader_create','Admin\IndexController@admin_leader_create')->name('admin.users.admin_leader_create');

    //后台权限显示路由
    Route::get('/users/admin_leader_index','Admin\IndexController@admin_leader_index')->name('admin.users.admin_leader_index');

    //后台权限添加处理路由
    Route::post('/users/admin_leader_add','Admin\IndexController@admin_leader_add')->name('admin.users.admin_leader_add');

    //后台修改权限路由
    Route::get('/users/admin_leader_edit/{id}','Admin\IndexController@admin_leader_edit')->name('admin.users.admin_leader_edit');

    //后台修改权限处理路由
    Route::post('/users/admin_leader_update/{id}','Admin\IndexController@admin_leader_update')->name('admin.users.admin_leader_update');

    //后台删除权限路由
    Route::get('/users/admin_leader_delete/{id}','Admin\IndexController@admin_leader_delete')->name('admin.users.admin_leader_delete');


    /**
     *
     * 合作商路由
     *
     */

    //后台显示合作商路由
    Route::get('/users/index','Admin\UsersController@index')->name('admin.users.index');

    //后台添加合作商路由
    Route::get('/users/create','Admin\UsersController@create')->name('admin.users.create');

    //后台添加合作商处理路由
    Route::post('/users/add','Admin\UsersController@add')->name('admin.users.add');

    //后台显示合作商详情路由
    Route::get('/users/show_info/{id}','Admin\UsersController@show_info')->name('admin.users.show_info');

    //后台修改合作商路由
    Route::get('/users/edit/{id}','Admin\UsersController@edit')->name('admin.users.edit');

    //后台修改合作商处理路由
    Route::post('/金黄色	￼	￼修改 ￼删除
颜色：	蓝色	￼users/update/{id}','Admin\UsersController@update')->name('admin.users.update');

    //后台删除合作商路由
    Route::get('/users/delete/{id}','Admin\UsersController@delete')->name('admin.users.delete');

    /**
     *
     * 合作商地址路由
     *
     */

    //后台添加收货地址路由
    Route::get('/users/addr_create/{id}','Admin\UsersController@addr_create')->name('admin.users.addr_create');

    //后台添加收货地址路由
    Route::post('/users/addr_add/{id}','Admin\UsersController@addr_add')->name('admin.users.addr_add');

    //后台修改收货地址路由
    Route::get('/users/{userId}/addr_edit/{id}','Admin\UsersController@addr_edit')->name('admin.users.addr_edit');

    //后台修改收货地址处理路由
    Route::post('/users/addr_update/{userId}/{id}','Admin\UsersController@addr_update')->name('admin.users.addr_update');

    //后台删除收货地址路由
    Route::get('/users/{userId}/addr_delete/{id}','Admin\UsersController@addr_delete')->name('admin.users.addr_delete');


    /**
     *
     * 产品类别路由
     *
     */

    //产品类别添加路由
    Route::get('/categories/create','Admin\CategoriesController@create')->name('admin.categories.create');

    //产品类别添加处理路由
    Route::post('/categories/add','Admin\CategoriesController@add')->name('admin.categories.add');

    //产品类别显示
    Route::get('/categories/index','Admin\CategoriesController@index')->name('admin.categories.index');

    //产品类别修改路由
    Route::get('/categories/edit/{id}','Admin\CategoriesController@edit')->name('admin.categories.edit');

    //产品类别修改处理路由
    Route::post('/categories/update/{id}','Admin\CategoriesController@update')->name('admin.categories.update');

    //产品类别删除路由
    Route::get('/categories/delete/{id}','Admin\CategoriesController@delete')->name('admin.categories.delete');


    /**
     *
     * 产品路由
     *
     */

    //产品添加路由
    Route::get('/goods/create','Admin\GoodsController@create')->name('admin.goods.create');

    //产品添加处理路由
    Route::post('/goods/add','Admin\GoodsController@add')->name('admin.goods.add');

    //产品显示路由
    Route::get('/goods/index','Admin\GoodsController@index')->name('admin.goods.index');

    //产品显示路由
    Route::get('/goods/addModel','Admin\GoodsController@addModel')->name('admin.goods.addModel');

    //产品修改路由
    Route::get('/goods/edit/{id}','Admin\GoodsController@edit')->name('admin.goods.edit');

    //产品修改路由
    Route::post('/goods/update/{id}','Admin\GoodsController@update')->name('admin.goods.update');

    //产品删除路由
    Route::get('/goods/delete/{id}','Admin\GoodsController@delete')->name('admin.goods.delete');


    /**
     *
     * 产品颜色路由
     *
     */

    //产品颜色详情路由
    Route::get('/goods/goodColor/{id}','Admin\GoodsController@goodColor')->name('admin.goods.goodColor');

    //产品添加颜色路由
    Route::get('/goods/goodColorCreate/{id}','Admin\GoodsController@goodColorCreate')->name('admin.goods.goodColorCreate');

    //产品添加颜色处理路由
    Route::post('/goods/goodColorAdd/{id}','Admin\GoodsController@goodColorAdd')->name('admin.goods.goodColorAdd');

    //产品删除颜色路由
    Route::get('/goods/goodColorDelete/{id}','Admin\GoodsController@goodColorDelete')->name('admin.goods.goodColorDelete');




    /**
     *
     * 产品规格路由
     *
     */

    //产品规格详情路由
    Route::get('/goods/goodGuige/{id}','Admin\GoodsController@goodGuige')->name('admin.goods.goodGuige');

    //产品添加规格路由
    Route::get('/goods/goodGuigeCreate/{id}','Admin\GoodsController@goodGuigeCreate')->name('admin.goods.goodGuigeCreate');

    //产品添加规格处理路由
    Route::post('/goods/goodGuigeAdd/{id}','Admin\GoodsController@goodGuigeAdd')->name('admin.goods.goodGuigeAdd');

    //产品删除规格色路由
    Route::get('/goods/goodGuigeDelete/{id}','Admin\GoodsController@goodGuigeDelete')->name('admin.goods.goodGuigeDelete');



});



