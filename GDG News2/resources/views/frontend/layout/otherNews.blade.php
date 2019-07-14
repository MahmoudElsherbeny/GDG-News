
@foreach(App\News::where('active', 1)->OrderBy('created_at','DESC')->take(24)->get() as $news)

    <div class="otherNews out-hidden fl-left full-width">
       <div class="breakingNews"> {!! App\Section::getSection($news->section) !!} </div>

        <div class="otherNewsImg full-width">
            <a href=" {{url('detailes/'.$news->id)}} " class="full-width" >
                <img src=" {{ url($news->image) }} " class="full-width" />
            </a>
        </div>
        <div class="otherNewsContent out-hidden full-width">
            <a href=" {{url('detailes/'.$news->id)}} ">
                <h2 class="newsTitle out-hidden">{{$news->title}}</h2>
            </a>
            <p>
                {{$news->out_description}}
            </p>
        </div>
    </div>
    
@endforeach