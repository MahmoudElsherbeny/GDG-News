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
               <h2 class="header-title">Video ( @if(isset($data)) {{$data->count()}} @else {{0}} @endif )</h2>
                 <div class="dataTables_wrapper">
                  
                  {!! Form::open(['method' => 'get']) !!}
                   <div class="dataTables_length">
                        <label>search:</label>
                        <input type="search" name="search" />
                   </div>
                  {!! Form::close() !!}
                
                   <div class="dataTables_filter">
                      <a href=" {{ url('dashboard/video/new') }} " class="btn btn-danger">Add New Video</a>
                   </div>
                
                     <table id="example2" class="display table dataTable" role="grid" aria-describedby="example2_info" style="width: 1039px;">
                   <thead>
                        <tr role="row">
                            <th style="width:40px">#</th>
                            <th style="width:60px">Section</th>
                            <th style="width:70px">Link</th>
                            <th style="width:70px">Imgae</th>
                            <th style="width:150px">Title</th>
                            <th aria-controls="example2" style="width: 220px;">Description</th>
                            <th style="width:60px">Out Description</th>
                            <th style="width:60px">Active</th>
                            <th style="width:80px">Journalist</th>
                            <th style="width:75px">Date</th>
                            <th style="width:160px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($data))
                           @foreach($data as $key => $video)
                            <tr @if($key%2==0)
                               class="even"
                          @else
                               class="odd"
                          @endif
                          >
                                <td style="width:40px">{{$key+1}}</td>
                                <td style="width:60px">{!! App\Section::getSectionName($video->section) !!}</td>
                                <td style="width:70px">{{$video->link}}</td>
                                <td style="width:70px"><img src="{{url($video->image)}}" width="70" height="70" ></td>
                                <td style="width:150px">{{$video->title}}</td>
                                <td style="max-width: 220px;">{{$video->description}}</td>
                                <td style="width:60px">{{$video->out_description}}</td>
                                <td style="width:60px">{!! App\Video::getActive($video->active) !!}</td>
                                <td style="width:80px">{{$video->journalist}}</td>
                                <td style="width:75px">{{explode(' ', $video->created_at)[0]}}</td>
                                
                                {!! Form::open(['url' => 'dashboard/video/delete/'.$video->id]) !!}
                                <td style="width:160px">
                                    <a href=" {{ url('dashboard/video/edit/'.$video->id) }} " class="btn btn-success">Edit</a>
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