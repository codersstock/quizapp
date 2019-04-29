@extends('layouts.app')

@section('content')

@auth

<div class="container">


<a href="{{route('users.index')}}" class="btn btn-primary m-3">Go Back</a>

<!-- Session success messages -->

@if(Session::has('success'))
<div class="alert alert-success">
<p>{{Session::get('success')}}</p>
</div>
@endif

<!-- Session success messages -->


<form class="mt-5" method="POST" action="{{route('users.update',$user->id)}}">

@csrf
<input type="hidden" name="_method" value="PUT">

<!-- row starts here -->
<div class="form-row m-3">
<div class="col-sm-6">
    <label for="name">User Name</label>
<input type="text" class="form-control" id="name" name="name" required="required" id="" value="{{$user->name}}">
</div>

<div class="col-sm-6">
<label for="email">User Email</label>
<input type="text" class="form-control" id="email" name="email" required="required" id="" value="{{$user->email}}">
</div>

</div>




<!-- row starts here -->
<div class="form-row m-3">
<div class="col-sm-6">
    <label for="password">User Password</label>
<input type="text" class="form-control" id="password" name="password" required="required" id="" value="{{$user->password}}">
</div>

<div class="col-sm-6">
<label for="role">User Role</label>
<input type="text" class="form-control" id="role" name="role" readonly required="required" id="" value="{{$user->role_id}}">
</div>

</div>




<input type="submit" value="Update" class="btn btn-outline-success" name="Update">
</form>
</div>

<!-- if user is admin the don not show this course enrollment -->

@if($user->role_id ==1)


@else
<!-- Enroll COurses -->
<div class="container">
<br>
<h4 class="text-secondary">Courses Enrolled</h4>

<form action="{{route('enroll')}}" method="POST">
@csrf
<div class="form-row">
<div class="col-sm-6">
<label for="course">Select Course</label>
<select class="form-control" name="course" id="course">
@if(count($courses))
@foreach($courses as $course)
<option value="{{$course->id}}">{{$course->title}}</option>
@endforeach
@endif

</select>


<input type="hidden" name="user_id" value="{{$user->id}}">


</div><br>
<div class="col-sm-3">
<input type="submit" class="m-3 mt-4 btn btn-info " value="Enroll">
</div>
</div>




</form>



</div>


   <div class="container mt-3">

   @foreach($user->courses as $course)
    <p class="alert alert-info mr-5 ml-5">{{$course->title}}</p> 
    
@endforeach


   </div>




@endif


@endauth
@endsection