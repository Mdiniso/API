<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_member extends Model
{
    //
    protected $fillable=[
        'name',
        'surname',
        'password',
        'address',
        'email',
        'gender',
        'phonenumbers',
        'dob',
        'picture'
    ];

    public function incidents(){
        return $this->hasMany('App\incident');
    }

    public function tipoff(){
        return $this->hasMany('App\TipOff');
    }

    public function assistance(){
        return $this->hasMany('App\Assistance');
    }

    public function attendanceRegister(){
        return $this->hasMany('App\AttendanceRegister');
    }

    public function multimedia(){
        return $this->hasMany('App\Multimedia');
    }

    public function p_member(){
        return $this->belongsTo('App\P_member');
    }

    
}
