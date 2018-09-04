<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderGood extends Model
{
    //
    protected $table          = "order_goods";
    protected $primaryKey     = "id";


    //订单商品表和购物车是一对一关系
    public function cart()
    {
        return $this->hasOne('App\Models\Cart','id','cart_id');
    }

}
