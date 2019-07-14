@extends('backend.layout.app')


@section('content')


    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Users/Admins </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
 <div class="row">
     <div class="col-md-12">
        <div class="white-box">
          <h2 class="header-title">Add New Admin</h2>
          
              @if ($errors->any())
                <div class="my-msg error-msg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
             
             @if(Session::has('error'))
                 <div class="my-msg error-msg">
                    {{Session::get('error')}}
                </div>
            @elseif(Session::has('success'))
                <div class="my-msg success-msg">
                    {{Session::get('success')}}
                </div>
            @endif
                 
           
            {!! Form::open() !!}
              <div class="form-group">
                <label>Username: </label>
                <input type="text" name="username" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Password: </label>
                <input type="password" name="password" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Confirm Password: </label>
                <input type="password" name="cpassword" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Rank: </label>
                <select name="rank" class="form-control">
                    <option value="2">Admin</option>
                    <option value="1">Supervisor</option>
                </select>
              </div>
              
              <button type="submit" class="btn btn-primary">Add</button>
              <a href=" {{ url('dashboard/admins') }} " class="btn btn-danger">Back</a>
            {!! Form::close() !!}
              
          </div>
       </div> 

  </div>
 <!--End row-->


@stop