<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href=" {{ url('frontend/images/letter_G_red-512.png') }} " type="image/png">
  <title>GDG - Dashboard</title>

    <!--Begin  Page Level  CSS -->
    <link href=" {{ url('backend/assets/plugins/morris-chart/morris.css') }} " rel="stylesheet">
    <link href=" {{ url('backend/assets/plugins/jquery-ui/jquery-ui.min.css') }} " rel="stylesheet"/>
     <!--End  Page Level  CSS -->
     
     <!-- TABLES STYLES -->
    <link href=" {{ url('backend/assets/plugins/datatables/css/jquery.dataTables.min.css') }} " rel="stylesheet" type="text/css"/>
    <link href=" {{ url('backend/assets/plugins/datatables/css/jquery.dataTables-custom.css') }} " rel="stylesheet" type="text/css"/>
    <!-- TABLES STYLES -->
     
    <link href=" {{ url('backend/assets/css/icons.css') }} " rel="stylesheet">
    <link href=" {{ url('backend/assets/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href=" {{ url('backend/assets/css/style.css') }} " rel="stylesheet">
    <link href=" {{ url('backend/assets/css/responsive.css') }} " rel="stylesheet">
    
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js') }} "></script>
          <script src="js/respond.min.js') }} "></script>
    <![endif]-->

</head>

<body class="sticky-header">


    <!--Start left side Menu-->
    @include('backend/layout/leftMenu')
    <!--End left side menu-->
    
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start--> 
        @include('backend/layout/header')
        <!-- header section end-->

        <!--body wrapper start-->
        <div class="wrapper">
        
        @yield('content')
        
        </div>
        <!-- End Wrapper-->


        <!--Start  Footer --> 
         @include('backend/layout/footer')	
         <!--End footer -->

       </div>
      <!--End main content -->
    


    <!--Begin core plugin -->
    <script src=" {{ url('backend/assets/js/jquery.min.js') }} "></script>
    <script src=" {{ url('backend/assets/js/bootstrap.min.js') }} "></script>
    <script src=" {{ url('backend/assets/plugins/moment/moment.js') }} "></script>
    <script  src=" {{ url('backend/assets/js/jquery.slimscroll.js ') }} "></script>
    <script src=" {{ url('backend/assets/js/jquery.nicescroll.js') }} "></script>
    <script src=" {{ url('backend/assets/js/functions.js') }} "></script>
    <!-- End core plugin -->
    
    <!--Begin Page Level Plugin-->
	<script src=" {{ url('backend/assets/plugins/morris-chart/morris.js') }} "></script>
    <script src=" {{ url('backend/assets/plugins/morris-chart/raphael-min.js') }} "></script>
    <script src=" {{ url('backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }} "></script>
    <script src=" {{ url('backend/assets/pages/dashboard.js') }} "></script>
    <!--End Page Level Plugin-->
    
    <!-- TABLES Plugin-->
	<script src=" {{ url('backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ url('backend/assets/pages/table-data.js') }} "></script>
    <!-- TABLES Plugin-->

    @yield('jscode')
   

</body>

</html>
