<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_leader extends Model
{
    //
    protected $table          = "admin_leaders";
    protected $primaryKey     = "id";

    public function users()
    {
        return $this->hasMany('App\Models\Admin_user','leader_id');
    }
}


