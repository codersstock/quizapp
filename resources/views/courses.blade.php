@extends('layouts.app')

@section('content')

@auth




<div class="container mt-5">
<!-- Session success messages -->

@if(Session::has('success'))
<div class="alert alert-success">
<p>{{Session::get('success')}}</p>
</div>
@endif



<!-- Session success messages -->

<!-- Displaying Error Messages -->
@if(count($errors)>0) 
<div class="col-sm-12">

<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>


</div> 
@endif


                        <!-- Add New Course -->

<div class="add_course m-3">
<form action="{{route('course.store')}}" method="POST">
                    @csrf
                    
                         <div class="form-row m-3">
                         <div class="col-sm-8">
                         
                         <input class="form-control" name="course_title" data-validation="length alphanumeric" data-validation-length="min4">
</div>
                         <div class="col-sm-4">
                         
                         <input type="submit" value="Add New Course" class="btn btn-info">

                         </div>
                         
                         </div>
                        
                       
                      




                      </form>
                      </div>
                 

                            <!-- End Section Add New Course -->



<table class="table table-resonsive table-hover">

<tr>
    <th>Course ID</th>
    <th>Course Name</th>
    <th>Created at</th>
    <th>Updated at</th>
</tr>
@foreach($courses as $course)
<tr>
    <td>{{$course->id}}</td>
    <td>
    <a href="course/{{$course->id}}/edit">{{$course->title}}</a></td>
</td>
   
 <td>{{$course->created_at}}</td>
 <td>{{$course->updated_at}}</td>
 @endforeach
      </tr>

 
</table>
</div>


<div class="container">
{{$courses->links()}}
</div>

<!-- 

        <button class="btn btn-secondary" id="addCourse" data-toggle="modal" data-target="#Modal">+ Add</button>


<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          
            <div class="modal-body">
                 
                   
            </div>
           
          </div>
        </div>
      </div> -->





      @endauth

      @endsection


