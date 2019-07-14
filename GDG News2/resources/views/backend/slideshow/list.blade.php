@extends('backend.layout.app')


@section('content')


    <!--Start Page Title-->
   <div class="page-title-box">
     <h4 class="page-title">Slide Show </h4>
     <div class="clearfix"></div>
   </div>
   <!--End Page Title--> 
  
   <!--Start row-->
   <div class="row">
       <div class="col-md-12">
           <div class="white-box">
               <h2 class="header-title">Slides ( @if(isset($data)) {{$data->count()}} @else {{0}} @endif )</h2>
                 <div class="dataTables_wrapper">
                  
                   <div class="dataTables_filter">
                      <a href=" {{ url('dashboard/slides/new') }} " class="btn btn-danger">Add New Slide</a>
                   </div>
                
                     <table id="example2" class="display table dataTable" role="grid" aria-describedby="example2_info" style="width: 1039px;">
                   <thead>
                        <tr role="row">
                            <th style="width:50px">#</th>
                            <th style="width:100px">Image</th>
                            <th style="width:150px">Title</th>
                            <th style="width: 250px;">Description</th>
                            <th style="width:80px">sort</th>
                            <th style="width:80px">Active</th>
                            <th style="width:100px">Date</th>
                            <th style="width:160px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($data))
                           @foreach($data as $key => $slide)
                            <tr @if($key%2==0)
                               class="even"
                          @else
                               class="odd"
                          @endif
                          >
                                <td style="width:50px">{{$key+1}}</td>
                                <td style="width:100px"><img src="{{url($slide->image)}}" width="80" height="80" ></td>
                                <td style="width:150px">{{$slide->title}}</td>
                                <td style="max-width: 250px;">{{$slide->description}}</td>
                                <td style="width:80px">{{$slide->sort}}</td>
                                <td style="width:80px">{!! App\Slide::getActive($slide->active) !!}</td>
                                <td style="width:100px">{{explode(' ', $slide->created_at)[0]}}</td>
                                
                                {!! Form::open(['url' => 'dashboard/slides/delete/'.$slide->id]) !!}
                                <td style="width:160px">
                                    <a href=" {{ url('dashboard/slides/edit/'.$slide->id) }} " class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                                {!! Form::close() !!}
                                
                            </tr>
                           @endforeach
                        @endif
                        
                    </tbody>
               </table>
               
                @if(isset($data))
                <div>
                    {!! $data->render() !!}
                </div>
                @endif
               
                </div>
           </div>
       </div>
   </div>
   <!--End row-->


@stop