<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $table = "department";
    public function department_user(){
        return $this->hasMany('App\Department_User', 'id_department', 'id');
    }
}
