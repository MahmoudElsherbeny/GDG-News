<!--Start left side Menu-->
<div class="left-side sticky-left-side">

    <!--logo-->
    <div class="logo">
        <a href=" ">{!! App\Setting::where('property','title')->first()->value !!}</a>
    </div>

    <!--logo-->

    <div class="left-side-inner">
        <!--Sidebar nav-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li class="nav-active">
                <a href=" {{ url('dashboard') }} "><i class="icon-home"></i> <span>Dashboard</span></a>
            </li>
 
            <li class="menu-list"><a href="#"><i class="icon-grid"></i> <span>Sections</span></a>
                <ul class="sub-menu-list">
                    <li><a href=" {{ url('dashboard/sections') }} "> All Sections</a></li>
                    <li><a href=" {{ url('dashboard/sections/new') }} "> New Section</a></li>
                </ul>
            </li>
            
            <li class="menu-list"><a href="#"><i class=" icon-paper-clip"></i> <span>News</span></a>
                <ul class="sub-menu-list">
                    <li><a href=" {{ url('dashboard/news') }} "> All News</a></li>
                    <li><a href=" {{ url('dashboard/news/new') }} "> New News</a></li>
                </ul>
            </li>
            
            <li class="menu-list"><a href="#"><i class=" icon-paper-clip"></i> <span>Popular News</span></a>
                <ul class="sub-menu-list">
                    <li><a href=" {{ url('dashboard/popular_news') }} "> All News</a></li>
                    <li><a href=" {{ url('dashboard/popular_news/new') }} "> New News</a></li>
                </ul>
            </li>
            
            <li class="menu-list"><a href="#"><i class=" icon-camera"></i> <span>Videos</span></a>
                <ul class="sub-menu-list">
                    <li><a href=" {{ url('dashboard/video') }} "> All Videos</a></li>
                    <li><a href=" {{ url('dashboard/video/new') }} "> New Videos</a></li>
                </ul>
            </li>
            
            <li class="menu-list"><a href="#"><i class=" icon-picture"></i> <span>Slide Show</span></a>
                <ul class="sub-menu-list">
                    <li><a href=" {{ url('dashboard/slides') }} "> All Slides</a></li>
                    <li><a href=" {{ url('dashboard/slides/new') }} "> New Slide</a></li>
                </ul>
            </li>

             <li><a href=" {{ url('dashboard/setting') }} "><i class="icon-wrench"></i> <span>Setting</span></a></li>

            <li class="menu-list"><a href="#"><i class="icon-user"></i> <span>Users</span></a>
                <ul class="sub-menu-list">
                   <li><a href=" {{ url('dashboard/users') }} ">All Users</a></li>
                   <li><a href=" {{ url('dashboard/admins') }} ">Admins</a></li>
                   
                @if(Auth::check()) 
                   @if(Auth::User()->rank == 1)
                    <li><a href=" {{ url('dashboard/admins/new') }} ">New Admin</a></li>
                   @endif
                @endif
                   
                </ul>
            </li>

        </ul>
        <!--End sidebar nav-->

    </div>
</div>
<!--End left side menu-->