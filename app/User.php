<?php

namespace App;
use App\Role;
use App\User;
use App\Photo;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo_id', 'is_active','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){

        return $this->belongsTo('App\Role');
    }


    public function photo(){

        return $this->belongsTo('App\Photo');
    }



    public function setPasswordAttribute($value){

        $this->attributes['password'] = md5($value);
    }
}
