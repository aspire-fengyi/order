<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table          = "users";
    protected $primaryKey     = "id";


    //获取用户详情表信息
    public function userInfo()
    {
        //用户表和用户详表 一对一
        return $this->hasOne('App\Models\UserInfo','user_id');

    }

    //获取收货地址
    public function userAddrs()
    {
        //用户表和收货地址表是一对多关系
        return $this->hasMany('App\Models\UserAddr','user_id');
    }

    //找到这个合作商属于哪个管理员
    public function admin_user_who()
    {
        return $this->belongsTo('App\Models\AdminUser','admin_user_id');
    }

    //获取用户购物车
    public function carts()
    {
        //用户表和收货地址表是一对多关系
        return $this->hasMany('App\Models\Cart','user_id');
    }

    //获取用户提交订单前信息
    public function beforeOrders()
    {
        //用户表和收货地址表是一对多关系
        return $this->hasMany('App\Models\BeforeOrders','user_id');
    }

}
