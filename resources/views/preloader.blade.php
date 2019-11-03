<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="user-scalable=NO,width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo3.png">
    <title>Khari Bulbul Resort</title>
    <!-- This page CSS -->
    <!-- This page CSS -->
    <link href="/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.min.css" rel="stylesheet">
    <link href="/css/AppAndCommon.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">



    <!-- Dashboard 1 Page CSS -->
    <link href="/css/pages/dashboard4.css" rel="stylesheet">
    <link href="/css/font.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    {{--SELECT bootstrap--}}
    <link href="/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('css')

</head>



<body class="wp-menu skin-green-dark fixed-layout">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
{{--<!-- ============================================================== -->--}}
<div class="preloader">
    <div class="loader">
        <div class="logo-image-loader">
            <img  src="../assets/images/logo30.png" alt="logo"  />
        </div>
        <div class="logo-text-loader">
            <h3 >Khari <b>Bulbul</b></h3>

        </div>

    </div>
    {{--<div class="logo-svg-loader">--}}
        {{--<svg id="preloaderSVG" viewBox="0 0 150 150" >--}}



            {{--<path class="path"stroke="#23B46E" fill="none" stroke-width="1" d="M0 40 H30 V0,H40 V20,H60 V0,H70,V40,H100 "></path>--}}
            {{--<path class="path" stroke="white" fill="none" stroke-width="1" d="M0 45 H40 V25,H40 V25,H60 V45,H70,V45,H100 "></path>--}}

            {{--<!--<path class="path" d="M20 20 H50 V0 L60 20" stroke="#23B46E" fill="transparent"></path>-->--}}
        {{--</svg>--}}
    {{--</div>--}}
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->


        @yield('content')

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- =========
   <div class="page-wrapper">
            <!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->

<footer   style="background: #2B2B2B;padding-top: 2vw;clear: both;" class="footer">
    <img src="/assets/images/logo3.png" style=" margin:0;padding: 0 ;width: 40px;height: 40px;" alt="">  <b style="color: white">Hotel </b> <b style="color:#00C292">Azerbaijan</b> <b style="color: white">© 2018 by Kalbaliev </b>
</footer>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>


<!-- Bootstrap popper Core JavaScript -->
<script src="/assets/node_modules/popper/popper.min.js"></script>
<script src="/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
{{--SELECT BOOT--}}
<script src="/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/js/sidebarmenu.js"></script>

<!--Custom JavaScript -->
<script src="/js/custom.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->






<script>

    $(document).ready(function(){
        $(document).keydown(function(event) {
            if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
                alert('disabling zooming');
                event.preventDefault();
                // 107 Num Key  +
                //109 Num Key  -
                //173 Min Key  hyphen/underscor Hey
                // 61 Plus key  +/=
            }
        });

        $(window).bind('mousewheel DOMMouseScroll', function (event) {
            if (event.ctrlKey == true) {
                alert('disabling zooming');
                event.preventDefault();
            }
        });
    });
</script>

<script src="/js/formobile.js"></script>


@yield('js')




</body>


</html>