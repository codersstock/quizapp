@extends('layouts.app')
@section('content')


<div class="col-sm-6">
<form name="courseform" id="courseform" action="/quiz" method="POST">
<select onChange="course()" name="course" id="course" class="form-control">
@foreach($courses as $course)
<option value="{{$course->id}}">{{$course->title}}</option>

@endforeach

</select>
<input type="submit" class="btn btn-primary" value="Select">

</form>

</div>


@endsection
