<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrol extends Model
{
    //
    public function p_member(){
        return $this->hasMany('App\P_member');
    }
}
