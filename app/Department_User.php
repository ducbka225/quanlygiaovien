<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department_User extends Model
{
    protected $table = "department_user";

    public function user(){
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function department(){
    	return $this->belongsTo('App\Department', 'id_department', 'id');
    }
}
