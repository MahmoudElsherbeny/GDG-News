@extends('frontend.layout.app')


@section('content')
   
   <!-- container -->
    <div class="container mainContainer full-width out-hidden">

        <div class="out-hidden register editProfile">
            <h1>Edit Profile</h1>
            <hr style="margin:8px 0 12px;">


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
              <div class="profile-left fl-left">
                  <img src=" {{url(Auth::User()->image)}} " id="image" class="profile-pic" >
                  <input type="file" name="img" id="img">
              </div>

              <!-- edit form column -->
            <div class="profile-right fl-left">
              <table>
                 <tr>
                     <td colspan="2"> <h1>Personal Info:</h1> </td>
                 </tr>

                 <tr>
                    <td class="label">
                        <label>Username:</label>
                    </td>
                    <td>
                        <input type="text" name="username" class="box full-width" value="{{Auth::User()->name}}">
                    </td>
                  </tr>
                  <tr>
                     <td class="label">
                         <label>Email:</label>
                     </td>
                     <td>
                         <input type="email" name="email" class="box full-width" value="{{Auth::User()->email}}" disabled>
                     </td>
                  </tr>
                  <tr>
                     <td class="label">
                         <label>Old Password:</label>
                     </td>
                     <td>
                         <input type="password" name="oldPassword" class="box full-width" >
                     </td>
                  </tr>
                  <tr>
                     <td class="label">
                         <label>New password:</label>
                     </td>
                     <td>
                         <input type="password" name="newPassword" class="box full-width" >
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                         <button class="btn submitBtn full-width">Save</button>
                     </td>
                  </tr>
                  
                </table>
            </div>
            {!! Form::close() !!}

            </div>
    
    </div>
<!-- end container  -->
  
   
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