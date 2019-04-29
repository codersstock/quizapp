<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
protected $fillable = ['title'];



public function users(){
    return $this->belongsToMany('App\User');
}

public function quizzes(){
    return $this->hasMany('App\Quiz');
}


}
