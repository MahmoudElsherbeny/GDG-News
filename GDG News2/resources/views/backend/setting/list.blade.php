@extends('backend.layout.app')


@section('content')


    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Setting </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
   <div class="row">
       <div class="col-md-12">
           <div class="white-box">
               <h2 class="header-title">Setting ( @if(isset($data)) {{$data->count()}} @else {{0}} @endif )</h2>
                 <div class="dataTables_wrapper">
                  
                  {!! Form::open(['method' => 'get']) !!}
                   <div class="dataTables_length">
                        <label>search:</label>
                        <input type="search" name="search" />
                   </div>
                  {!! Form::close() !!}
                
                <table id="example2" class="display table dataTable">
                   <thead>
                        <tr>
                            <th>#</th>
                            <th>Property</th>
                            <th>Value</th>
                            <th>Update Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($data))
                           @foreach($data as $key => $property)
                            <tr @if($key%2==0)
                              class="even"
                          @else
                              class="odd"
                          @endif
                          >
                                <td>{{$key+1}}</td>
                                <td><span class="btn btn-info" >{{$property->property}}</span></td>
                                <td>{{$property->value}}</td>
                                <td>{{explode(' ', $property->updated_at)[0]}}</td>
                                
                                <td>
                                    <a href=" {{ url('dashboard/setting/edit/'.$property->id) }} " class="btn btn-success">Edit</a>
                                </td>
                                
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