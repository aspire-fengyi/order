<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeforeOrders extends Model
{
    protected $table          = "before_orders";
    protected $primaryKey     = "id";

    //订单前和购物车是一对一关系
    public function cart()
    {
        return $this->hasOne('App\Models\Cart','id','cart_id');
    }

}
