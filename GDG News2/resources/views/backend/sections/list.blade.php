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
               <h2 class="header-title">Sections ( @if(isset($data)) {{$data->count()}} @else {{0}} @endif )</h2>
                 <div class="dataTables_wrapper">
                  
                  {!! Form::open(['method' => 'get']) !!}
                   <div class="dataTables_length">
                        <label>search:</label>
                        <input type="search" name="search" />
                   </div>
                  {!! Form::close() !!}
                
                   <div class="dataTables_filter">
                      <a href=" {{ url('dashboard/sections/new') }} " class="btn btn-danger">Add New Section</a>
                   </div>
                
                     <table id="example2" class="display table dataTable">
                   <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Active</th>
                            <th>Sort</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($data))
                           @foreach($data as $key => $section)
                            <tr @if($key%2==0)
                              class="even"
                          @else
                              class="odd"
                          @endif
                          >
                                <td>{{$key+1}}</td>
                                <td>{{$section->name}}</td>
                                <td>{!! App\Section::getActive($section->id) !!}</td>
                                <td>{{$section->sort}}</td>
                                <td>{{explode(' ', $section->created_at)[0]}}</td>
                                
                                {!! Form::open(['url' => 'dashboard/sections/delete/'.$section->id]) !!}
                                <td>
                                    <a href=" {{ url('dashboard/sections/edit/'.$section->id) }} " class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                                {!! Form::close() !!}
                                
                            </tr>
                           @endforeach
                        @endif
                        
                    </tbody>
               </table>
               
               @if(Session::has('error'))
                 <div class="my-msg error-msg">
                    {{Session::get('error')}}
                </div>
             @elseif(Session::has('success'))
                <div class="my-msg success-msg">
                    {{Session::get('success')}}
                </div>
             @endif
               
                </div>
           </div>
       </div>
   </div>
   <!--End row-->


@stop