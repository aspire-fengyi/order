<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;
    //
    protected $table          = "orders";
    protected $primaryKey     = "id";
    protected $datas = ['deleted_at'];


    //获取用户订单详情
    public function orderGoods()
    {
        return $this->hasMany('App\Models\OrderGood','order_id');
    }

    //订单和用户是属于关系
    public function whichUser()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    //订单和收货地址是一对一
    public function addr()
    {
        return $this->hasOne('App\Models\UserAddr','id','addr_id');
    }

}
