@extends('backend.layout.app')


@section('content')


    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Users </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
   <div class="row">
       <div class="col-md-12">
           <div class="white-box">
               <h2 class="header-title">Users ( @if(isset($data)) {{$data->count()}} @else {{0}} @endif )</h2>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($data))
                           @foreach($data as $key => $user)
                            <tr @if($key%2==0)
                              class="even"
                          @else
                              class="odd"
                          @endif
                          >
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{explode(' ', $user->created_at)[0]}}</td>
                                                                
                            </tr>
                           @endforeach
                        @endif
                        
                    </tbody>
               </table>
               
                <div>
                    {!! $data->render() !!}
                </div>
               
                </div>
           </div>
       </div>
   </div>
   <!--End row-->


@stop