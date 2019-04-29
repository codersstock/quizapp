@extends('layouts.app')

@section('content')
@if(Auth::check())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                 <div class="row">
                 <div class="col">
                 <h1>
                     {{Auth::user()->name}}
                    </h1>
 
                 </div>
                 <div class="col">
                 <h1 class='text-info font-italic'>

@if(Auth::user()->role_id == 2)
Student
@elseif(Auth::user()->role_id == 1)
Admin
@else
Teacher

@endif

                 </h1>
                 </div>
                 </div>
           <br>     
<div class="row">

<div class="col">
<div class="form-group display-5 text-secondary">
                   <h4> Identification Number : {{Auth::user()->id}}</h4>
                    </div>

</div>
<div class="col">
<div class="form-group display-5 text-secondary">
<h4> {{Auth::user()->email}}</h4>
                    </div>
</div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
