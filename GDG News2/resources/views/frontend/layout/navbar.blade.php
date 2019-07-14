<!-- navbar -->
<nav class="navbar">

        <!-- logo -->
        <div class="logo fl-left">
            <a href=" {{url('/')}} ">
                {!! App\Setting::where('property','title')->first()->value !!}<span>News</span>
            </a>
        </div>

        <!-- fields -->
        <div class="fields">
            <ul class="ls-st-none" >
               
                @if(App\Section::count() > 0)
                   @foreach(App\Section::where('active', 1)->OrderBy('sort','ASC')->get() as $section)
                    <li class="fl-left lsChecked" ><a href=" 
                    @if($section->name == 'video')
                    {{url($section->name)}}
                    @else
                    {{url('sec/'.$section->name)}}
                    @endif
                     ">{{$section->name}}</a></li>
                    @endforeach
                @endif
                                               
                                                                                                             
            </ul>
        </div>

        <!-- login & Signup -->
        <div class="form fl-right">
            <ul class="ls-st-none full-width" >
              
             @if(Auth::check())
                <li class="fl-left username" >
                    <img src="{{ url(Auth::User()->image) }}" />
                    <span>{{Auth::User()->name}}</span>
                    
                    <ul class="ls-st-none full-width account-info">
                        <li class="full-width" >
                            <a href=" {{url('profile/edit/'.Auth::User()->id)}} " class="full-width">
                                <i class="fas fa-user" style="margin-right:15px; font-size:12px"></i>Profile
                            </a>
                        </li>
                        <li class="full-width" >
                            <a href=" {{url('logout')}} " class="full-width">
                                <i class="fas fa-lock" style="margin-right:15px; font-size:12px"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
             @else 
                <li class="fl-left" >
                    <a href=" {{url('signup')}} " class="btn">SignUp</a>
                </li>
                <li class="fl-left" >
                    <a href=" {{url('login')}} " class="btn">Login</a>
                </li>
             @endif
             
            </ul>
        </div>

        <!--  menu button  display in small screen only  -->
        <button class="mobileMenuButton" id="mobileMenuBtn"> <i class="fas fa-bars fa-lg"></i> </button>

        <div class="mobileMenu" id="mobileMenu">
            <ul class="ls-st-none" >
                
                @if(App\Section::count() > 0)
                   @foreach(App\Section::OrderBy('sort','ASC')->get() as $section)
                    <li class="full-width" >
                        <a href=" {{url($section->name)}} " class="full-width" >{{$section->name}}</a>
                    </li>
                    @endforeach
                @endif
                
                <hr>

                <li class="full-width" >
                    <button class="full-width" > <a href=" {{url('signup')}} " class="full-width">SignUp</a> </button>
                </li>
                <li class="full-width" >
                    <button class="full-width" > <a href=" {{url('login')}} " class="full-width">Login</a> </button>
                </li>
            </ul>
        </div>

</nav>
<!-- end navbar  -->