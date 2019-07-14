<!--  footer links  -->
<div class="footerLinks out-hidden full-width">
    <div class="container">

        <div class="ftlinks fl-left out-hidden">
            <h2>Pages:</h2>
            <ul class="ls-st-none">
               
               @if(App\Section::count() > 0)
                   @foreach(App\Section::where('active', 1)->OrderBy('sort','ASC')->get() as $section)
                    <li> <a href=" {{url('sec/'.$section->name)}} ">{{$section->name}}</a></li>
                    @endforeach
                @endif
               
            </ul>
        </div>

        <div class="ftlinks followUS fl-left out-hidden">
            <h2>Follow Us:</h2>
            <ul class="ls-st-none">
                <li> 
                    <img src=" {{url('frontend/images/Facebook-Icon.png')}} " > 
                    <a href=" {!! App\Setting::where('property','facebook')->first()->value !!} " target="_blank" > Facebook</a>
                </li>
                <li> 
                    <img src=" {{url('frontend/images/Twitter-Icon.png')}} " > 
                    <a href=" {!! App\Setting::where('property','twitter')->first()->value !!} " target="_blank" >Twitter</a>
                </li>
                <li> 
                    <img src=" {{url('frontend/images/Insta-Icon.png')}} " >
                    <a href=" {!! App\Setting::where('property','instagram')->first()->value !!} " target="_blank" >Instagram</a>
                </li>
                <li> 
                    <img src=" {{url('frontend/images/Youtube-Icon.png')}} " > 
                    <a href=" {!! App\Setting::where('property','youtube')->first()->value !!} " target="_blank" >Youtube</a>
                </li>
            </ul>
        </div>

        <div class="ftlinks contact fl-left out-hidden">
            <h2>Contact Us:</h2>
            <ul class="ls-st-none">
                <li> 
                    <i class="fas fa-envelope" style="font-size:32px"></i>
                    <span>{!! App\Setting::where('property','email')->first()->value !!}</span> 
                </li>
                <li> 
                    <i class="fas fa-phone" style="font-size:32px"></i> 
                    <span>{!! App\Setting::where('property','phone')->first()->value !!}</span> 
                </li>
            </ul>
        </div>

    </div>
</div>
<!--  end footer links  -->

<!--  footer  -->
<div class="footer full-width out-hidden">
    <p>Copyright &copy; {!! App\Setting::where('property','copyright')->first()->value !!}</p>
</div>
<!-- end footer  -->