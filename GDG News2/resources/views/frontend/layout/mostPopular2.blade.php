
@foreach(App\Popularnews::where(['active' => 1, 'type' => !1])->OrderBy('created_at','DESC')->get() as $news)

    <div class="mostPopular2 out-hidden fl-left full-width">
        <div class="popularNewsImg full-width">
            <a href=" {{url('detailes/'.$news->id)}} " class="full-width" >
                <img src=" {{ url($news->image) }} " class="full-width" />
            </a>
        </div>
        <div class="popularNewsContent out-hidden full-width">
            <a href=" {{url('detailes/'.$news->id)}} ">
                <h2 class="newsTitle out-hidden">{{$news->title}}</h2>
            </a>
            <p>
                {{$news->out_description}}
            </p>
        </div>
    </div>

@endforeach