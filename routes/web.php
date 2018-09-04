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


//后台登录页面路由
Route::get('/admin/login','Admin\LoginController@login')->name('admin.login');

//登录后台管理员验证路由
Route::post('/admin/doLogin/','Admin\LoginController@doLogin')->name('admin.doLogin');


//后台路由组

Route::group(['prefix'=>'admin','middleware' => 'adminFlag'],function(){




    /**
     *
     * 管理员路由
     *
     */
    //管理员退出路由
    Route::get('/logout','Admin\LoginController@logout')->name('admin.logout');

    //管理员修改密码
    Route::get('/rePassword/{id}','Admin\IndexController@rePassword')->name('admin.rePassword');

    //管理员修改密码处理
    Route::post('/doRePassword/{id}','Admin\IndexController@doRePassword')->name('admin.doRePassword');



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

    //后台分组显示合作商路由2
    Route::get('/users/index_he','Admin\UsersController@index_fenzu')->name('admin.users.index_fenzu');

    //后台添加合作商路由
    Route::get('/users/create','Admin\UsersController@create')->name('admin.users.create');

    //后台添加合作商处理路由
    Route::post('/users/add','Admin\UsersController@add')->name('admin.users.add');

    //后台显示合作商详情路由
    Route::get('/users/show_info/{id}','Admin\UsersController@show_info')->name('admin.users.show_info');

    //后台修改合作商路由
    Route::get('/users/edit/{id}','Admin\UsersController@edit')->name('admin.users.edit');

    //后台修改合作商处理路由
    Route::post('/users/update/{id}','Admin\UsersController@update')->name('admin.users.update');

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

    //产品修改颜色路由
    Route::get('/goods/goodColorEdit/{id}','Admin\GoodsController@goodColorEdit')->name('admin.goods.goodColorEdit');

    //产品修改颜色处理路由
    Route::post('/goods/goodColorUpdate/{id}','Admin\GoodsController@goodColorUpdate')->name('admin.goods.goodColorUpdate');



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

    //产品修改路由
    Route::get('/goods/goodGuigeEdit/{id}','Admin\GoodsController@goodGuigeEdit')->name('admin.goods.goodGuigeEdit');

    //产品修改处理路由
    Route::post('/goods/goodGuigeUpdate/{id}','Admin\GoodsController@goodGuigeUpdate')->name('admin.goods.goodGuigeUpdate');

    //产品删除规格色路由
    Route::get('/goods/goodGuigeDelete/{id}','Admin\GoodsController@goodGuigeDelete')->name('admin.goods.goodGuigeDelete');


    /**
     *
     * 产品图路由
     *
     */

    //产品效果图显示路由
    Route::get('/goods/goodPicture/{id}','Admin\GoodsController@goodPicture')->name('admin.goods.goodPicture');

    //产品效果图添加路由
    Route::get('/goods/goodPictureCreate/{id}','Admin\GoodsController@goodPictureCreate')->name('admin.goods.goodPictureCreate');

    //产品效果图添加处理路由
    Route::post('/goods/goodPictureAdd/{id}','Admin\GoodsController@goodPictureAdd')->name('admin.goods.goodPictureAdd');

    //产品效果图删除路由
    Route::get('/goods/goodPictureDelete/{id}','Admin\GoodsController@goodPictureDelete')->name('admin.goods.goodPictureDelete');



    /**
     *
     * 产品轮播图路由
     *
     */

    //轮播图详情
    Route::get('/lunbos/index','Admin\LunbosController@index')->name('admin.lunbos.index');

    //添加产品轮播图路由
    Route::get('/lunbos/create','Admin\LunbosController@create')->name('admin.lunbos.create');

    //添加产品轮播图路由
    Route::post('/lunbos/add','Admin\LunbosController@add')->name('admin.lunbos.add');

    //删除产品轮播图路由
    Route::get('/lunbos/delete/{id}','Admin\LunbosController@delete')->name('admin.lunbos.delete');

    //显示产品轮播图路由
    Route::get('/lunbos/xianshi/{id}','Admin\LunbosController@xianshi')->name('admin.lunbos.xianshi');

    //隐藏产品轮播图路由
    Route::get('/lunbos/yincang/{id}','Admin\LunbosController@yincang')->name('admin.lunbos.yincang');


    /**
     *
     * 订单路由
     *
     */

    //订单列表
    Route::get('/orders/index','Admin\OrdersController@index')->name('admin.orders.index');

    //新增订单列表
    Route::get('/orders/new','Admin\OrdersController@new')->name('admin.orders.new');

    //待发货订单列表
    Route::get('/orders/daifahuo','Admin\OrdersController@daifahuo')->name('admin.orders.daifahuo');

    //已发货订单列表
    Route::get('/orders/yifahuo','Admin\OrdersController@yifahuo')->name('admin.orders.yifahuo');

    //订单详情
    Route::get('/orders/info/{id}','Admin\OrdersController@info')->name('admin.orders.info');

    //修改订单状态路由
    Route::post('/orders/status/{id}','Admin\OrdersController@status')->name('admin.orders.status');

    //打印订单路由
    Route::get('/orders/info_dayin/{id}','Admin\OrdersController@info_dayin')->name('admin.orders.info_dayin');




});


//前台首页路由
Route::get('/{id?}','Home\IndexController@index')->name('home.index');


//前台登录路由
Route::get('/home/login/','Home\LoginController@login')->name('home.login');

//前台登录处理路由
Route::post('/home/doLogin/','Home\LoginController@doLogin')->name('home.doLogin');




//前台路由组  需要中间件
Route::group(['prefix'=>'home','middleware' => 'homeFlag'],function(){

    //前台用户退出路由
    Route::get('/logout/','Home\LoginController@logout')->name('home.logout');

    //商品详情路由
    Route::get('/goods/info/{id}','Home\GoodsController@info')->name('home.goods.info');


    /**
     *
     * 购物车路由
     *
     */

    //加入购物车处理路由
    Route::post('/carts/add/{id}','Home\CartController@cartsAdd')->name('home.carts.add');

    //购物车详情路由
    Route::get('/carts/index/','Home\CartController@index')->name('home.carts.index');

    //删除购物车
    Route::get('/carts/delete/{id}','Home\CartController@delete')->name('home.carts.delete');




    /**
     *
     * 收货地址路由
     *
     */

    //添加收货地址路由
    Route::get('/addr/create','Home\AddrController@create')->name('home.addr.create');

    //添加收货地址处理路由
    Route::post('/addr/add/{id}','Home\AddrController@add')->name('home.addr.add');

    //修改收货地址路由
    Route::get('/addr/edit/{id}','Home\AddrController@edit')->name('home.addr.edit');

    //修改收货地址处理路由
    Route::post('/addr/update/{id}','Home\AddrController@update')->name('home.addr.update');



    /**
     *
     * 订单路由
     *
     */

    //加入订单路由
    Route::post('/order/order/add/','Home\OrderController@orderAdd')->name('home.order.orderAdd');

    //订单详情路由
    Route::get('/orders/index/','Home\OrderController@index')->name('home.orders.index');

    //提交订单成功显示路由
    Route::get('/order/success/{id}','Home\OrderController@success')->name('home.order.success');

    //确认付款路由
    Route::get('/order/fukuan/{id}','Home\OrderController@fukuan')->name('home.order.fukuan');

    //确认收货路由
    Route::get('/order/shouhuo/{id}','Home\OrderController@shouhuo')->name('home.order.shouhuo');

    //软删除订单路由
    Route::get('/order/softDelete/{id}','Home\OrderController@softDelete')->name('home.order.softDelete');

    //订单回收站路由
    Route::get('/order/laJiOrders','Home\OrderController@laJiOrders')->name('home.order.laJiOrders');

    //恢复订单路由
    Route::get('/order/huiFuOrder/{id}','Home\OrderController@huiFuOrder')->name('home.order.huiFuOrder');

    //彻底删除订单路由
    Route::get('/order/delete/{id}','Home\OrderController@delete')->name('home.order.delete');


    /**
     *
     * 用户修改密码路由
     *
     */

    //修改密码显示页面
    Route::get('/user/resPassword/{id}','Home\IndexController@rePassword')->name('home.user.rePassword');

    //修改密码处理路由
    Route::post('/user/passwordUpdate/{id}','Home\IndexController@passwordUpdate')->name('home.user.passwordUpdate');



});


//前台路由组 无需中间件
Route::group(['prefix'=>'home'],function(){

    /**
     *
     * 前台首页路由
     *
     */

    //商品信息路由
    Route::get('/goods/index/{id}','Home\GoodsController@index')->name('home.goods.index');

});









