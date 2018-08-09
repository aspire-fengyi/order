<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    //

    public function leader_who()
    {
        return $this->belongsTo('App\Models\Admin_leader','leader_id');
    }
}
