@extends('layouts.app')

@section('content')


@if(Auth::check())

<div class="container mt-5">

<div class="col-sm-4 m-4">

<button class="btn btn-secondary btn-block" id="addCourse" data-toggle="modal" data-target="#Modal">+ Create New Quiz</button>

</div>


<!-- Session success messages -->

@if(Session::has('success'))
<div class="alert alert-success m-4">
<p>{{Session::get('success')}}</p>
</div>
@endif



<!-- Session success messages -->



<table class="table table-resonsive table-hover">

<tr>
    <th>Quiz Title</th>
    <th>No of Questions</th>
    <th>Mark Per Question</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Delete</th>



</tr>

@foreach($quizzes as $quiz)

<tr class="">
  
    <td><a href="{{route('quiz.edit',[$quiz->id])}}">{{$quiz->title}}</a></td>   
    <td>{{$quiz->no_of_questions}}</td> 
    <td>{{$quiz->mark_per_question}}</td>
    <td>{{$quiz->created_at}}</td> 
    <td>{{$quiz->updated_at}}</td>   
<td>
<form action="{{route('quiz.destroy',[$quiz->id])}}" method="POST">
@csrf
<input type="hidden" name="_method" value="DELETE">
<input type="submit" value="Delete" class="btn btn-danger">

</form>
</td>  
   
   </tr>
   
@endforeach
 

</table>
</div>












<!-- =========================================================
                        Modal For Add New User  
        ======================================= -->


<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Quiz</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          
            <div class="modal-body">
                 
<form method="POST" action="{{route('quiz.store')}}">
@csrf
<!-- row starts here -->
<div class="form-row m-3">
<div class="col-sm-6">
    <label for="title">Title Quiz</label>
<input type="text" class="form-control" id="title" name="title" required="required" id="" value="">
</div>



<div class="col-sm-6">
<label for="course">Select Course</label>
<select class="form-control" name="course" id="course">
@if(count($user))
@foreach($user->courses as $course)
<option value="{{$course->id}}">{{$course->title}}</option>
@endforeach
@endif

</select>
</div>

</div>


<!-- row starts here -->
<div class="form-row m-3">
<div class="col-sm-6">
    <label for="questions">No of Questions</label>
<input type="number" class="form-control" id="questions" min="10" max="100"  name="questions" required="required" id="" value="">
</div>


<div class="col-sm-6">
    <label for="mark">Mark Per Question</label>
<input type="number" class="form-control" id="mark" min="1" max="5"  name="mark" required="required" id="" value="">
</div>


</div>

<div class="form-group m-5">
<input type="submit" value="Click To Create Quiz" class="btn btn-dark">
</div>

</form>

                
                 


            </div>
           
          </div>
        </div>
      </div>






@endif

@endsection