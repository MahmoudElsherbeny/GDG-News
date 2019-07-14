@extends('backend.layout.app')


@section('content')


    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Slides </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
 <div class="row">
     <div class="col-md-12">
        <div class="white-box">
          <h2 class="header-title">Add New Slide</h2>
          
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
                <label>Slide Title: </label>
                <input type="text" name="title" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Slide Description: </label>
                <input type="text" name="descripe" class="form-control" autocomplete="off" >
              </div>
              
              <div class="form-group">
                <label>Sort: </label>
                <input type="number" name="sort" class="form-control" autocomplete="off" placeholder="default: 0" >
              </div>
            
              <div class="form-group">
                <label>Slide Activation: </label>
                <select name="active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Desactive</option>
                </select>
              </div>
              
              <div class="form-group">
                <label>Slide Image: </label>
                <img src="#" width="250" height="250" id="image" style="margin:10px 0">
                <input type="file" name="img" id="img" >
              </div>
              
              <button type="submit" class="btn btn-primary">Add</button>
              <a href=" {{ url('dashboard/slides') }} " class="btn btn-danger">Back</a>
            {!! Form::close() !!}
              
          </div>
       </div> 

  </div>
 <!--End row-->


@stop


@section('jscode')


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