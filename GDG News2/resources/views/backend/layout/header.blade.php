<!-- header section start-->
<div class="header-section">

    <a class="toggle-btn"><i class="fa fa-bars"></i></a>

    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
            
            @if(Auth::check())
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <img src=" {{ url(Auth::User()->image) }} " alt="" />
                    {{ Auth::User()->name }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  <li> <a href=" {{ url('dashboard/profile/edit/'.Auth::User()->id) }} "> <i class="fa fa-user"></i> Profile </a> </li>
                  <li> <a href=" {{ url('logout') }} "> <i class="fa fa-lock"></i> Logout </a> </li>
                </ul>
            </li>
            @endif

        </ul>
    </div>
    <!--notification menu end -->

</div>
<!-- header section end-->