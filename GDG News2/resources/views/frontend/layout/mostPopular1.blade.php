<?php
$news = App\Popularnews::where(['active' => 1, 'type' => 1])->first()
?>

<div class="mostPopular out-hidden full-width">
   <div class="breakingNews"> Most Popular</div>

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
