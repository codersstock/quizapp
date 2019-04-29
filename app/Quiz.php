<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    
    protected $fillable = ['user_id','title','mark_per_question','no_of_questions'];


public function questions()
{
    return $this->hasMany('App\Question');
}

public function scores(){
    return $this->hasMany('App\Score');    
}


}
