@extends('layouts.app')

@section('content')


<!-- Session success messages -->

@if(Session::has('success'))
<div class="alert alert-success">
<p>{{Session::get('success')}}</p>
</div>
@endif



<!-- Session success messages -->



<form method="POST" action="{{route('create-question')}}">
@csrf
<!-- row starts here -->
<div class="form-row m-3">
<div class="col-sm-12">
    <label for="question">Question</label>
<input type="text" class="form-control" id="question" name="question" required="required" id="" value="">
</div>


</div>

<!-- row endssssss -->


<!-- row starts here -->
<div class="form-row m-3">


<!-- column 1 -->
<div class="col-sm-6">
<div class="input-group ">
  <input type="text" class="form-control" name="optiona" required="required" placeholder="Option A" aria-label="Text input with checkbox">
</div>
</div>

<!-- column 2 -->
<div class="col-sm-6">
<div class="input-group">
  <input type="text" class="form-control" name="optionb" required="required" placeholder="Option B" aria-label="Text input with checkbox">
</div>
</div>



</div>

<!-- row endssssss -->


<!-- row starts here -->
<div class="form-row m-3">


<!-- column 1 -->
<div class="col-sm-6">
<div class="input-group">
  <input type="text" class="form-control" name="optionc" required="required"  placeholder="Option C" aria-label="Text input with checkbox">
</div>
</div>

<!-- column 2 -->
<div class="col-sm-6">
<div class="input-group">
  
  <input type="text" class="form-control" name="optiond"  required="required" placeholder="Option D" aria-label="Text input with checkbox">
</div>
</div>



<!-- column 1 -->
<div class="col-sm-6 mt-3">
<div class="input-group">
  <input type="text"  name="answer" class="bg-light text-dark p-3"  required="required" placeholder="Answer" aria-label="Text input with checkbox">
</div>
</div>


</div>

<!-- row endssssss -->

<input type="hidden" name="quiz_id" value="{{\Request::segment(2)}}">
<input type="submit" value="Add Question" class="m-3 btn btn-outline-success">




</form>

<div class="container mt-5">
<table class="table table-horizontal">

<tr class="bg-secondary text-white">
  <th>Question</th>
  <th>Option A</th>
  <th>Option B</th>
  <th>Option C</th>
  <th>Option D</th>
  <th>Correct</th>
</tr>

@foreach($questions as $question)
<tr>
  <td>{{$question->question}}</td>
  <td>{{$question->a}}</td>
  <td>{{$question->b}}</td>
  <td>{{$question->c}}</td>
  <td>{{$question->d}}</td>
  <td>{{$question->correct}}</td>
</tr>
@endforeach

</table>
</div>


@endsection