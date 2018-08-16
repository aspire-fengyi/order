<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLeader extends Model
{
    //
    protected $table          = "admin_leaders";
    protected $primaryKey     = "id";

    public function users()
    {
        return $this->hasMany('App\Models\AdminUser','leader_id');
    }

    public function hezuoshang()
    {
        return $this->hasMany('App\Models\User','leader_id');
    }
}


