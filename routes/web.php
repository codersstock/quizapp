<?php

use App\Role;
use App\User;
use App\Course;
use App\Question;
use App\Score;
use App\Quiz;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});



Route::post('/course-enroll','CourseEnroll@add')->name('enroll');



 Route::get('/enroll', function () {
// //     $user = User::find(2);
// //    $c = Course::find(9);
// //     $user->courses()->save($c);
// // //echo $user->courses->get();
//$user = App\User::find(4);

// // one course have many users
// // $course = App\User::find(2);
// // foreach($course->courses as $c){
// //     echo $c . "<br>";
// // }

// foreach($user->courses as $course){
// echo $course->title . "<br>";


//}

// one course has many quizzes
// $course = Course::find(4);
// $quiz = new App\Quiz(['title'=>'quiz23','mark_per_question'=>2,'no_of_questions'=>10]);
// $course->quizzes()->save($quiz);

 });




// All Users who have role_id 1
//Route::get('/role', function () {
//     $user = App\role::find(1);
//     foreach($user->users as $u){
//         echo $u->name . "<br>";
//     }
// });


// one quiz has many questions


 Route::get('/question', function () {

 //$quiz = App\Quiz::find(3);
// $question = new Question(['question'=>'question here','a'=>'optiona','b'=>'optionb'
// ,'c'=>'optionc','d'=>'optiond','correct'=>'optiona'
// ]);

// //$quiz->questions()->save($question);
// //delete all questions from quiz id 1
// //$quiz->questions()->delete();
//$quiz->delete();

// All questions from quiz id 3
//$quiz->questions()->get();


 });



Route::get('/addscore',function(){
    // CREATE SCORE
$user = User::find(4);
$result = new Score(['quiz_id'=>3,'scores'=>10]);
return $user->scores()->save($result);
});


Route::get('/r1',function(){
    // one quiz have many scores
$quiz = Quiz::find(3);
$results = $quiz->scores()->get();
echo "<h1>Result Card of Quiz id 3</h1> <br>";
echo "id QuizId UserId Scores <br>";

foreach($results as $result){
    echo "<h4>". $result->id .  " " .$result->quiz_id . "   " .$result->user_id . " " . $result->scores  ."<br>";
}


});


Route::get('/r2',function(){
    
    echo "<br><h1>Users that are admin</h1>" . "<br>";
    $role = Role::find(1);
    $users = $role->users()->orderBy('name','asc')->get();
    echo $users;

    
    echo "<br><h1>Users that are teacher</h1>" . "<br>";
    $role = Role::find(3);
    $users = $role->users()->orderBy('name','asc')->get();
    echo $users;


    echo "<br><h1>Users that are Student</h1>" . "<br>";
    $role = Role::find(2);
    $users = $role->users()->orderBy('name','asc')->get();
    echo $users;

});



// Route::get('/addquestion', function () {
    
//     //return view('quiz.create-question',compact('questions'));
// });



Route::resource('/course', "CourseController");
Route::resource('/users', "UsersController");

Route::resource('/quiz', "QuizController");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/createQuestion','QuestionController@create')->name('create-question');


