<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table          = "categories";
    protected $primaryKey     = "id";


    //获取产品
    public function goods()
    {
        //类别和产品是一对多关系
        return $this->hasMany('App\Models\Good','category_id');
    }
}
