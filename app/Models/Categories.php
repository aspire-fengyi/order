<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table          = "categories";
    protected $primaryKey     = "id";


    //获取产品型号
    public function goods()
    {
        //产品和产品型号是一对多关系
        return $this->hasMany('App\Models\Good','category_id');
    }
}
