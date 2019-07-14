@extends('backend.layout.app')


@section('content')
  

    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Edit Profile </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 

<div class="row">
     <div class="col-md-12">
        <div class="white-box">
            <h2 class="header-title">Edit Profile</h2>
            <hr>
            
            
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
            
            
            {!! Form::open(['files' => 'true']) !!}
              <!-- left column -->
              <div class="col-md-3">
                <div class="text-center">
                  <img src=" {{url(Auth::User()->image)}} " id="image" class="avatar img-circle profile-pic" alt="avatar">
                  <h6>Profile Picture</h6>

                  <input type="file" name="img" id="img">
                </div>
              </div>

              <!-- edit form column -->
              <div class="col-md-9 personal-info">
                <h3>Personal Info</h3>

                 <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" value="{{Auth::User()->name}}">
                  </div>

                  <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="{{Auth::User()->email}}" disabled>
                  </div>

                  <div class="form-group">
                    <label>Old Password:</label>
                    <input type="password" name="oldPassword" class="form-control" >
                  </div>
                  
                  <div class="form-group">
                    <label>New password:</label>
                      <input type="password" name="newPassword" class="form-control" >
                  </div>
                  
                  <div class="form-group">
                      <button class="btn btn-primary">Save</button>
                      <span></span>
                      <a href=" {{ url('dashboard') }} " class="btn btn-danger">Back</a>
                  </div>
                {!! Form::close() !!}

              </div>
              
        </div>
    </div>
</div>


@stop


@section('jscode')

<!--  for preview image  -->
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#img").change(function() {
      readURL(this);
    });
</script>


@stop