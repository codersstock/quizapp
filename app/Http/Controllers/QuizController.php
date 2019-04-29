<?php

namespace App\Http\Controllers;
use Session;
use App\Course;
use App\Quiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = Auth::User()->id;

       if(Auth::User()->role_id==2){
        $user =  User::findOrFail($auth_user);
        $courses = $user->courses()->get();
        $course = Course::findOrFail(2);
        $quizlist = $course->quizzes()->get();
       // return view('quiz.takequiz',compact('courses'));
      return $quizlist;
    }

       else{
        $user = User::findOrFail($auth_user);
        $quizzes = Quiz::where('user_id','=',$auth_user)->get();
      return view('quiz.quiz',compact('user','quizzes'));
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $course = Course::findOrFail($request->course);
        $quiz = new Quiz(['user_id'=>Auth::user()->id,'title'=>$request->title,'mark_per_question'=>$request->mark,'no_of_questions'=>$request->questions]);
        $course->quizzes()->save($quiz);
        return redirect('/quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz =  Quiz::findOrFail(3);
        $questions = $quiz->questions()->get();
        
        return view('quiz.create-question',compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->questions()->delete();
        $quiz->delete();
        return redirect('/quiz');
    }
}
