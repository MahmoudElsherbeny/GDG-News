@extends('backend.layout.app')


@section('content')


    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Sections </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
 <div class="row">
     <div class="col-md-12">
        <div class="white-box">
          <h2 class="header-title">Edit Section</h2>
          
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
                <label>Section Name: </label>
                <input type="text" name="name" class="form-control" autocomplete="off"
                 value="{{$data->name}}" >
              </div>
              
              <div class="form-group">
                <label>Section Activation: </label>
                <select name="active" class="form-control">
                    <option value="1" @if($data->active == 1) {{'selected'}} @endif >Active</option>
                    <option value="0" @if($data->active == 0) {{'selected'}} @endif >Desactive</option>
                </select>
              </div>
              
              <div class="form-group">
                <label>Section Sort: </label>
                <input type="number" name="sort" class="form-control" placeholder="default: 0" autocomplete="off" value="{{$data->sort}}" >
              </div>
              
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href=" {{ url('dashboard/sections') }} " class="btn btn-danger">Back</a>
            {!! Form::close() !!}
              
          </div>
       </div> 

  </div>
 <!--End row-->


@stop