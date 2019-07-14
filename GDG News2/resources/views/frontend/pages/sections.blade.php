@extends('frontend.layout.app')


@section('content')
   

   <!--  politics news  -->
    <div class="container mainContainer">
        <div class="politicsNews">

           @foreach($data as $news)
            <div class="otherNews out-hidden fl-left full-width">
                <div class="otherNewsImg full-width">
                    <img src="{{url($news->image)}}" alt="pic"  class="full-width" />
                </div>
                <div class="otherNewsContent out-hidden full-width">
                    <a href="{{url('detailes/'.$news->id)}}">
                        <h2 class="newsTitle out-hidden">{{$news->title}}</h2>
                    </a>
                    <p>
                        {{$news->out_description}}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!--  end politics news  -->
    
   
@stop