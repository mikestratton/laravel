<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->hasOne('App\Post');
    }

    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function roles(){

        return $this->belongsToMany('App\Role')->withPivot('created_at');

        // To customize table names and columns follow the format below.
//        return $this->belongsToMany('App\Role', 'my_table_name', 'user_id', 'role_id');

    }

    public function photos(){

        return $this->morphMany('App\Photo', 'imagetable');

    }
}
