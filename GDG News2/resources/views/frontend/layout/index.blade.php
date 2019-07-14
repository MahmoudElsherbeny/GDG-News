@extends('frontend.layout.app')


@section('content')


    <div class="container mainContainer full-width out-hidden">
        <div class="mainNewsContainer full-width out-hidden">

            <!-- right side news  -->
            @include('frontend/layout/rightSideNews')
            <!--  end right side news  -->

            <!--  main news  -->
            <div class="mainNews fl-left">

                <!--  slider of breaking news -->
                @include('frontend/layout/slider')
                <!--  end slider of breaking news  -->

                <!--  popular news  -->
                @include('frontend/layout/mostPopular1')

                <!--  most popular 2  -->
                @include('frontend/layout/mostPopular2')
                <!--  end popular news  -->

            </div>
            <!--  end main news  -->

        </div>
        <!--  end main news container -->

        <hr id="seeOther">

        <!--  start oters news container -->
        <div class="otherNewsContainer full-width out-hidden" id="otherNews">
            @include('frontend/layout/otherNews')
        </div>

    </div>
    <!--  end container  -->


@stop