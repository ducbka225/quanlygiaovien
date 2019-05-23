<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseach_Field extends Model
{
    protected $table = "research_field";

    public function lecture_research(){
    	return $this->hasMany('App\Lecture_Research', 'id_research_field', 'id');
    }

    public function lecture_qt(){
    	return $this->hasMany('App\Lecture_qt', 'id_research_field', 'id');
    }
}
