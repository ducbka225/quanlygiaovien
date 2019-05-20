<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lecture_research(){
        return $this->hasMany('App\Lecture_Reseach', 'id_user', 'id');
    }

    public function lecture_qt(){
        return $this->hasMany('App\Lecture_qt', 'id_user', 'id');
    }

    public function department_user(){
        return $this->hasMany('App\Department_User', 'id_user', 'id');
    }
}