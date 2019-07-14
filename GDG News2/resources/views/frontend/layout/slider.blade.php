<!--  slider of breaking news -->
<div class="newsSlider out-hidden full-width">

   <div class="breakingNews">Breaking News</div>

   <!--  slide 1  -->
    @foreach(App\Slide::OrderBy('sort','ASC')->get() as $slide)
    <div class="slide full-width">
        <img src=" {{ url($slide->image) }} " alt="ukraine navy"  class="full-width" />
        <div class="slideShadow full-width"></div>
        <div class="slideNews out-hidden">

            <h2 class="newsTitle out-hidden">{{ $slide->title }}</h2>
            <p>{{ $slide->description }}... </p>

        </div>
    </div>
    @endforeach

</div>
<!--  end slider of breaking news  -->