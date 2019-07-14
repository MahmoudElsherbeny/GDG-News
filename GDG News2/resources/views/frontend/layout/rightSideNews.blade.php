<!-- right side news  -->
<div class="right fl-right">

    <!-- top news  -->
    <ul class="out-hidden ls-st-none full-width">
       <h2>latest news:</h2>

        <div>
            
            @if(isset($news))
            @foreach($news as $news)
            <li>
                <div class="rightNewsImage out-hidden fl-left">
                    <a href="#"  class="full-width" >
                        <img src=" {{ url($news->image) }} " class="full-width"  />
                    </a>
                </div>
                <div class="rightNewsContent fl-left">
                    <a href=" {{url('detailes/'.$news->id)}} ">
                        <h4 class="newsTitle">{{$news->title}}</h4>
                    </a>
                    <span>By: {{$news->journalist}}</span>
                </div>
            </li>
            @endforeach
            @endif

            <div class="seemore">
                <a href="#seeOther" class="fl-right">see more &gt;&gt; </a>
            </div>
        </div>
    </ul>
    <!--  end top news  -->

    <!--  top videos  -->
    <ul class="out-hidden ls-st-none full-width">
        <h2>latest videos:</h2>

        <!-- first -->
        <div>
           
           @foreach($videos as $video)
            <li>
                <div class="rightNewsImage out-hidden fl-left">
                    <a href=" {{url('video/detailes/'.$video->id)}} " class="full-width" >
                        <img src=" {{ url($video->image) }} "  class="full-width" />
                        <i class="far fa-play-circle fa-2x"></i>
                    </a>
                </div>
                <div class="rightNewsContent fl-left">
                    <a href=" {{url('video/detailes/'.$video->id)}} ">
                        <h4 class="newsTitle">{{$video->title}}</h4>
                    </a>
                    <span>by: {{$video->journalist}}</span>
                </div>
            </li>
            @endforeach

            <div class="seemore">
                <a href=" {{url('video')}} " class="fl-right">see more &gt;&gt; </a>
            </div>

        </div>
    </ul>
    <!--  end top videos  -->

</div>
<!--  end right side news  -->