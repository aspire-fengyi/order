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
        return $this->hasOne('UserInfo','user_id');

    }

    //说去收货地址
    public function userAddr()
    {
        //用户表和收货地址表是一对多关系
        return $this->hasMany('UserAddr','user_id');
    }

}
