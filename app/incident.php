<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incident extends Model
{
    //
    public function c_member(){
        return $this->belongsTo('App\C_member');
    }

    public function assistance(){
        return $this->hasMany('App\Assistance');
    }

    public function tipoff(){
        return $this->hasMany('App\TipOff');
    }

    public function multimedia(){
        return $this->hasMany('App\Multimedia');
    }
}
