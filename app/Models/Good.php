<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = "goods";
    protected $primaryKey = "id";

    //获取产品模型
    public function goodModel()
    {
        //产品和产品模型是一对一关系
        return $this->hasOne('App\Models\GoodModel', 'good_id');
    }

    //获取产品颜色
    public function goodColors()
    {
        //产品和产品颜色是一对多关系
        return $this->hasMany('App\Models\GoodColor', 'good_id');
    }

    //获取产品规格
    public function goodGuiges()
    {
        //产品和产品规格是一对多关系
        return $this->hasMany('App\Models\GoodGuige', 'good_id');
    }

}
