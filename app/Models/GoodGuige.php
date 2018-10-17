<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodGuige extends Model
{
    protected $table          = "good_guiges";
    protected $primaryKey     = "id";

    //找到这个规格属于哪个产品
    public function whichGood()
    {
        return $this->belongsTo('App\Models\Good','good_id');
    }

    //获取产品颜色
    public function goodColors()
    {
        //产品和产品颜色是一对多关系
        return $this->hasMany('App\Models\GoodColor', 'guige_id');
    }
}
