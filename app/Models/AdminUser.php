<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table          = "admin_users";
    protected $primaryKey     = "id";

    public function leader_who()
    {
        return $this->belongsTo('App\Models\AdminLeader','leader_id');
    }
}
