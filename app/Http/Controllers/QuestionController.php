<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use Session;
use App\Question;

class QuestionController extends Controller
{
    public function index(){
        
    }

    public function create(Request $request){
    
    
        $quiz_id = $request->quiz_id;
        $quiz = Quiz::find($quiz_id);
        $question = new Question(['question'=>$request->question,
        'a'=>$request->optiona,
        'b'=>$request->optionb,
        'c'=>$request->optionc,
        'd'=>$request->optiond,
        'correct'=>$request->answer,
        'created_at'=>null,
        'updated_at'=>null
        ]);
        
        $quiz->questions()->save($question);
        Session::flash('success','Question Added');
   return redirect('/quiz' . '/' . $quiz_id . '/edit');



    }

}
