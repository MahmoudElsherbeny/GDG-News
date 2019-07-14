<!DOCCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <title>{!! App\Setting::where('property','title')->first()->value !!} News</title>
        <link rel="stylesheet" href=" {{ url('frontend/css/main.css') }} " />
        <link rel="stylesheet" href=" {{ url('frontend/css/navbar%20and%20footer.css') }} " />
        <link rel="stylesheet" href=" {{ url('frontend/css/style.css') }} " />
        <link rel="stylesheet" href=" {{ url('frontend/css/news_details.css') }} " />
        <link rel="stylesheet" href=" {{ url('frontend/css/signup_login.css') }} " />
        <link rel="stylesheet" href=" {{ url('frontend/css/media_quires.css') }} " />
        <link rel="stylesheet" href=" {{ url('frontend/css/all.min.css') }} " />
        <link rel="icon" href=" {{ url('frontend/images/letter_G_red-512.png') }} " />
    </head>
    <body>
        
        <!-- navbar -->
        @include('frontend/layout/navbar')
        <!-- end navbar  -->
        
        
        @yield('content')
        
        
        <!--  footer  -->
        @include('frontend/layout/footer')
        <!-- end footer  -->
        
        <script src=" {{ url('frontend/js/main.js') }} "></script>
        <script src=" {{ url('frontend/js/slider.js') }} "></script>
        
        @yield('jscode')
        
    </body>
</html>