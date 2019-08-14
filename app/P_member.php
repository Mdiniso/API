<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P_member extends Model
{
    //
    public function c_member(){
        return $this->belongsTo('App\C_member');
    }

    public function patrol(){
        return $this->belongsTo('App\Patrol');
    }
}
