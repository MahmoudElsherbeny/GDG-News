@extends('backend.layout.app')


@section('content')


   <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Videos </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
 <div class="row">
     <div class="col-md-12">
        <div class="white-box">
          <h2 class="header-title">Add New Video</h2>
          
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
              <div class="form-group">
                <label>Video Section: </label>
                <select name="section" class="form-control" >
                    @foreach(App\Section::all() as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label>Video Title: </label>
                <input type="text" name="title" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Video Description: </label>
                <textarea  id="mytextarea" name="descripe">Hello</textarea>
              </div>
              
              <div class="form-group">
                <label>Video Out Description: </label>
                <input type="text" name="out_description" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Video Activation: </label>
                <select name="active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Desactive</option>
                </select>
              </div>
              
              <div class="form-group">
                <label>Journalist: </label>
                <input type="text" name="journalist" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Video Link: </label>
                <input type="text" name="link" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>News Image: </label>
                <img src="#" width="250" height="250" id="image" style="margin:10px 0">
                <input type="file" name="img" id="img" >
              </div>
              
              <button type="submit" class="btn btn-primary">Add</button>
              <a href=" {{ url('dashboard/video') }} " class="btn btn-danger">Back</a>
            {!! Form::close() !!}
              
          </div>
       </div> 

  </div>
 <!--End row-->


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
   
    <!-- tiny text -->
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    
@stop
