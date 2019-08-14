<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    public function incident(){
        return $this->belongsTo('App\incident');
    }

    public function c_member(){
        return $this->belongsTo('App\C_member');
    }
}
