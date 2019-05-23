<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Lecture extends Model
{
    protected $table = "user_lecture";

    public function user(){
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function lecture_qt(){
    	return $this->belongsTo('App\Lecture_qt', 'id_lecture_qt', 'id');
    }
}
