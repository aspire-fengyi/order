<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table          = "carts";
    protected $primaryKey     = "id";

    //购物车和商品一对一
    public function good()
    {
        return $this->hasOne('App\Models\Good','id','good_id');
    }

    //购物车和商品规格一对一
    public function goodGuige()
    {
        return $this->hasOne('App\Models\GoodGuige','id','guige_id');
    }

    //购物车和商品颜色一对一
    public function goodColor()
    {
        return $this->hasOne('App\Models\GoodColor','id','color_id');
    }

}
