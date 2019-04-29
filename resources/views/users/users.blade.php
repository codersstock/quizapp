@extends('layouts.app')

@section('content')
@if(Auth::check())

<div class="container mt-5">

<div class="col-sm-4 m-4">

<button class="btn btn-secondary btn-block" id="addCourse" data-toggle="modal" data-target="#Modal">+ Add New User</button>

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
    <th>User ID</th>
    <th>Role</th>
    <th>UserName</th>
    <th>Email</th>
   




</tr>

@foreach($usersList as $user)

<tr>
  
    
    <td>{{$user->id}}</td>
    <td>{{$user->role_id}}</td> 
    <td><a href="{{route('users.edit',[$user->id])}}">{{$user->name}}</a></td>   
    <td>{{$user->email}}</td>   
  
   
   </tr>
   
@endforeach
 

</table>
</div>

<div class="container">
{{$usersList->links()}}
</div>
<!-- =========================================================
                        Modal For Add New User  
        ======================================= -->


<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          
            <div class="modal-body">
                 
                    <form action="{{route('users.store')}}" method="POST">
@csrf
                    <div class="form-group">
                    <select class="form-control" name="role">


@if(count($roles))
@foreach($roles as $role)

<option value="{{$role->id}}">{{$role->name}}</option>

@endforeach
@endif
                   
                    
                    </select>
                                      </div>
<br>



                        <p>
                         <div class="form-group">
                          <input class="form-control" name="name" placeholder="Enter UserName" data-validation="length alphanumeric" data-validation-length="min10">
                        </div>
                          <small class="text-muted">Use Letters Numbers [a-z 0-9]</small>                      
                        </p>
<div class="form-row">
    <div class="col-md-6">
                        <p>
                                <div class="form-group">
                                        <input class="form-control" placeholder="Enter Password" name="password" data-validation="number length" data-validation-length="min6">
                                      </div>
                                                
                        </p>
                    </div>
              
                <div class="col-md-6">
                        <p>
                         <div class="form-group">
                          <input type="text" name="email"  data-validation="email" class="form-control" placeholder="Enter Email">
                        </div>
                                              
                        </p>

</div>
</div>

                        
                        

                              <input type="submit" class="btn btn-primary">
                        </p>
                      </form>
                
                 


            </div>
           
          </div>
        </div>
      </div>


@endif
@endsection