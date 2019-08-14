<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceRegister extends Model
{
    //
    public function meeting(){
        return $this->belongsTo('App\Meeting');
    }

    public function c_member(){
        return $this->belongsTo('App\C_member');
    }
}
