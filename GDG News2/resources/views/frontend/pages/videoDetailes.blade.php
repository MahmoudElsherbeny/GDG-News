@extends('frontend.layout.app')


@section('content')
   
   <!-- container -->
    <div class="container mainContainer full-width out-hidden">
      
        <!--  news details  -->
        <div class="newsDet full-width">
            <div class="newsDetImg full-width out-hidden">
               <iframe class="full-width" height="100%" src=" {{url($data->link)}} " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <!--  news content  -->
            <div class="newsDetContent full-width out-hidden">

                <h2 class="newsTitle"> {{$data->title}} </h2>

                <div class="newsDateWriter">
                    <span class="newsDate"> {{$data->created_at}} </span>
                    <span class="newsWriter">By: {{$data->journalist}} </span>
                </div>

                <div class="newsParagraph">
                    {!! $data->description !!}
                </div>
            </div>
            <!--  end news content  -->

            <!--  news comment  -->
            @if(Auth::check())
            <div class="container" style="min-height:0">
               <button class="share btn">share</button>

               {!! Form::open() !!}
                <div class="newsComment">
                    <textarea name="comment" placeholder="write comment..." class="commentArea full-width"></textarea>
                    <button type="submit" class="sendComment btn">send</button>
                </div>
                {!! Form::close() !!}

                <div class="usersComments full-width out-hidden">
                   
                @if(isset($comment)) 
                  @foreach($comment as $comment)
                    <div class="commentContent full-width out-hidden">
                        <div class="userImg  fl-left out-hidden">
                            <img src=" {{url(App\User::where('id',$comment->user_id)->first()->image)}} " title="profile pic" />
                        </div>
                        <div class="usrComment fl-left">
                            <h2>{!! App\User::getUser($comment->user_id) !!}</h2>
                            <p>{{$comment->comment}}</p>
                            <span class="commentTime">{{$comment->created_at}}</span>
                            @if(Auth::User()->id == $comment->user_id)
                                <a href="{{url('comment/delete/'.$comment->id)}}" class="commentDelete"> <i class="fas fa-times"></i> </a>
                            @endif
                        </div>
                    </div>
                  @endforeach
                 @endif


                </div>
            </div>
            @endif
            <!--  end news comment  -->

        </div>
        <!--  end news details  -->

        <!--  see also news  -->
        <div class="seeAlso full-width out-hidden">
            <h2 class="seeAlsoTitle">see also:</h2>

            @foreach($seealso as $alsonews)
            <div class="seeAlsoNews out-hidden fl-left">
                <img src=" {{ url($alsonews->image) }} " class="full-width" />
                <div class="seeAlsoShadow full-width"></div>
                <div class="seeAlsoNewsContent out-hidden full-width">
                    <a href=" {{ url('video/detailes/'.$alsonews->id) }}  ">
                        <h2 class="newsTitle">{{$alsonews->title}}</h2>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        <!--  end see also news  -->

    </div>
   <!-- end container  -->
  
   
@stop