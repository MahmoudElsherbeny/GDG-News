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
               <h2 class="header-title">Admins ( @if(isset($data)) {{$data->count()}} @else {{0}} @endif )</h2>
                 <div class="dataTables_wrapper">
                  
                  {!! Form::open(['method' => 'get']) !!}
                   <div class="dataTables_length">
                        <label>search:</label>
                        <input type="search" name="search" />
                   </div>
                  {!! Form::close() !!}
                
                  @if(Auth::User()->rank == 1)
                   <div class="dataTables_filter">
                      <a href=" {{ url('dashboard/admins/new') }} " class="btn btn-danger">Add New Admin</a>
                   </div>
                  @endif
                
                     <table id="example2" class="display table dataTable">
                   <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rank</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($data))
                           @foreach($data as $key => $admin)
                            <tr @if($key%2==0)
                              class="even"
                          @else
                              class="odd"
                          @endif
                          >
                                <td>{{$key+1}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{!! App\User::getUserRank($admin->rank) !!}</td>
                                <td>{{explode(' ', $admin->created_at)[0]}}</td>
                                
                                {!! Form::open(['url' => 'dashboard/admins/delete/'.$admin->id]) !!}
                                <td>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                                {!! Form::close() !!}
                                
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