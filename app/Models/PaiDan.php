<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaiDan extends Model
{
    protected $table          = "paidan";
    protected $primaryKey     = "id";

    //找到这个派单信息属于那个运营商
    public function who()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
