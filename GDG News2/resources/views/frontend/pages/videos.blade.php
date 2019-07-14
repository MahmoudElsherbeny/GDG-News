@extends('frontend.layout.app')


@section('content')
   

   <!--  politics news  -->
    <div class="container mainContainer">
        <div class="politicsNews">

           @foreach($data as $video)
            <div class="otherNews out-hidden fl-left full-width">
                <div class="otherNewsImg full-width">
                   <a href=" {{url('video/detailes/'.$video->id)}} " class="full-width" >
                       <img src=" {{ url($video->image) }} "  class="full-width" />
                    </a>
                </div>
                <div class="otherNewsContent out-hidden full-width">
                    <a href="{{url('video/detailes/'.$video->id)}}">
                        <h2 class="newsTitle out-hidden">{{$video->title}}</h2>
                    </a>
                    <p>
                        {{$video->out_description}}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!--  end politics news  -->
    
   
@stop