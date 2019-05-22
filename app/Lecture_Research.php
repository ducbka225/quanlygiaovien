<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture_Research extends Model
{
    protected $table = "lecture_research";

    public function user(){
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function research_field(){
    	return $this->belongsTo('App\Reseach_Field', 'id_research_field', 'id');
    }
}
