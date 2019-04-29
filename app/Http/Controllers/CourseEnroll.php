<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;


class CourseEnroll extends Controller
{
    public function add(Request $request){

        $user = User::findOrFail($request->user_id);
           $c = Course::findOrFail($request->course);
            $user->courses()->save($c);


return redirect('users/'. $request->user_id . '/edit');
    }



    public function delete(Request $request){

        $user = User::findOrFail($request->user_id);
           $c = Course::findOrFail($request->course);
            $user->courses()->save($c);


return redirect('users/'. $request->user_id . '/edit');
    }



}
