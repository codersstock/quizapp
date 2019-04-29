@extends('layouts.app')

@section('content')

@auth

<div class="container">


<a href="{{route('course.index')}}" class="btn btn-primary m-3">Go Back</a>

<!-- Session success messages -->

@if(Session::has('success'))
<div class="alert alert-success">
<p>{{Session::get('success')}}</p>
</div>
@endif

<!-- Session success messages -->


<form class="mt-5" method="POST" action="{{route('course.update',$Course_id->id)}}">

@csrf
<input type="hidden" name="_method" value="PUT">

<div class="form-group">
<input type="text"  class="form-control" name="id" id="" readonly value="{{$Course_id->id}}">

<input type="text" class="form-control" name="title" required="required" id="" value="{{$Course_id->title}}">
</div>
<input type="submit" value="Update" class="btn btn-outline-success" name="Update">
</form>
</div>

@endauth
@endsection