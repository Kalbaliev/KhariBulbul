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
            <h3 >Kharı <b>Bulbul</b></h3>

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
    <header>


        <ul  class="navbar-nav">
            <!-- This is  -->
            <li class="nav-item nav-button-special forphone"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i style="color:#00C292" class="ti-menu"></i></a> </li>

           {{--Burda olan dil deyismek yeri telefonda acilmasi ucundu --}}

            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


                @if(\LaravelLocalization::setLocale()!=$localeCode )
                    <li class="changeLang forphone hideLang" style="float: right;margin-top: 15vw">
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img style="width: 40px" src="/assets/images/logo-for-lang/{{ $properties['regional'] }}.png" alt="{{ $properties['name'] }}">
                        </a>
                    </li>
                @endif
            @endforeach

        </ul>
        <div  class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div   class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon -->

                        <img style="width: 4vw; height: 4vw;float:left" src="../assets/images/logo30.png" alt="homepage" class="light-logo" />

                        <h4 style=" padding: 0; float: left; margin-top: 1.8vw;font-size: 1vw; line-height:.5vw; color:#c7254e;">Khari <br> <b style=" padding: 0; float: left;margin-top: .5vw;font-size: 1.3vw; line-height:.5vw; color:#23B46E;">Bulbul</b></h4>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div  class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav" style="width: 100%;">
                        <!-- This is  -->

                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <ul style="float: right; width: 100%; list-style-type: none;">

                        <!-- ============================================================== -->
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


                        @if(\LaravelLocalization::setLocale()!=$localeCode )
                            <li style="float: right;margin-right: 1vw;margin-top: 1vw">
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img style="width: 40px" src="/assets/images/logo-for-lang/{{ $properties['regional'] }}.png" alt="{{ $properties['name'] }}">
                                </a>
                            </li>
                        @endif
                        @endforeach
                            <label id="ForLanguage" title="{{\LaravelLocalization::setLocale()}}" style="float: right;margin-right: 1vw;margin-top: 1.2vw;color:white" for=""><b>{{trans('app-page.change_lang')}}</b></label>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User Profile-->
            <div class="user-profile">
                <div class="user-pro-body">
                    <div><img  style="border: 2px solid #00C292"  src="/uploads/img/users/resized/profile1.jpg" alt="user-img" class="img-circle"></div>
                    <div class="dropdown">

                        @php
                            $istifadeci_adi=\Illuminate\Support\Facades\Auth::user()->first_name." ".\Illuminate\Support\Facades\Auth::user()->last_name;
                            $status=\Illuminate\Support\Facades\Auth::user()->status;


                        if(\LaravelLocalization::setLocale()=='en'){

                            if($status=='0'){

                            $work_name='New User';
                            }
                            else if($status=='1'){

                            $work_name='Administrator';
                            }
                            else if ($status=='2'){

                            $work_name='Editor & Author';
                            }
                              else if ($status=='3'){
                            $work_name='Exited Clienti';
                            }
                            else if ($status=='8'){

                            $work_name='Unconfirmed Client';
                            }
                            else if ($status=='9'){
                            $work_name='Confirmed Client';
                            }

                        }
                        else if (\LaravelLocalization::setLocale()=='az'){

                            if($status=='0'){
                            $work_name='Yeni İstifadəçi';
                            }
                            else if($status=='1'){
                            $work_name='İnzibatçı';
                            }
                            else if ($status=='2'){
                            $work_name='Yazar & Redaktor';
                            }
                             else if ($status=='3'){
                            $work_name='Çıxmış Müştəri';
                            }
                             else if ($status=='8'){
                            $work_name='Təsdiqlənməmiş Müştəri';
                            }
                            else if ($status=='9'){
                            $work_name='Təsdiqlənmiş Müştəri';
                            }
                        }
                        @endphp

                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"><b>{{$istifadeci_adi}}</b> <br> {{$work_name}} <br>   </span></a>
                        <div class="dropdown-menu animated flipInY">





                            <!-- text-->
                            <a href="/Çıxış" class="dropdown-item"><i class="fa fa-power-off"></i> {{trans('app-page.exit')}}</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-small-cap formobilehide"> &nbsp &nbsp {{trans('app-page.common_operations')}}</li>
                    @php
                        $user_status=Auth::user()->status;

                          $innovation_numb =App\Innovations::get()->count();
                    @endphp
                    @if($user_status!='0' && $user_status!='8')
                    <li > <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">&nbsp{{trans('app-page.home')}}</span></a>

                    </li>
                    @endif
                  @if($user_status!='8' && $user_status!='9')
                    <li > <a class=" waves-effect waves-dark " href="/Qeydiyyat" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">&nbsp{{trans('app-page.registration')}}</span></a>

                    </li>
                    @endif
                    @if($user_status=='8' )
                        <li > <a class=" waves-effect waves-dark " href="/Müştəri-Məlumatı" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">&nbsp{{trans('app-page.client_information')}}</span></a>

                        </li>
                    @endif
                    @if($user_status!='8' && $user_status!='9' && $user_status!='0')
                    <!-- <li> <a class="waves-effect waves-dark" href="/Ödəniş" aria-expanded="false"><i class="mdi mdi-square-inc-cash"></i><span class="hide-menu">&nbsp{{trans('app-page.payment')}}</span></a>

                    </li>
                    <li> <a class="waves-effect waves-dark" href="/Elan-Yarat" aria-expanded="false"><i class="mdi mdi-creation"></i><span class="hide-menu">&nbsp{{trans('app-page.createads')}}</span></a>

                    </li> -->
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">&nbsp{{trans('app-page.list')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="/Müştərilər">{{trans('app-page.clients')}}</a></li>
                            @if($user_status=='1')
                            <li><a href="/İstifadəçilər">{{trans('app-page.users')}}</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if($user_status=='9')
                    <li> <a class="waves-effect waves-dark" href="/Xidmətlər" aria-expanded="false"><i class="mdi mdi-puzzle"></i><span class="hide-menu">&nbsp{{trans('app-page.services')}} </span></a>

                    </li>
                    @endif

                    @if($user_status!='0' &&$user_status!='8')
                    <li> <a class="waves-effect waves-dark" href="/Yeniliklər" aria-expanded="false"><i class="mdi mdi-puzzle"></i><span class="hide-menu">&nbsp{{trans('app-page.innovations')}} <span class="badge badge-pill badge-primary text-white ml-auto">{{$innovation_numb}}</span></span></a>

                    </li>
                    <li class="nav-small-cap formobilehide"> &nbsp &nbsp {{trans('app-page.hotel_staff_and_support')}}</li>
                    <li> <a class="waves-effect waves-dark" href="/Personallar" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">&nbsp{{trans('app-page.personals')}} </span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="/Vəzifəli-şəxslər" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">&nbsp{{trans('app-page.offical')}}</span></a>

                    </li>

                    @endif
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div style="position: relative;height: auto" class="page-wrapper">

        @yield('content')
    </div>
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
    <img src="/assets/images/logo30.png" style=" margin:0;padding: 0 ;width: 40px;height: 40px;" alt="">  <b style="color: white">Khari </b> <b style="color:#00C292">Bulbul</b> <b style="color: white">© 2018 by
        <a href="http://kalbaliev-dev.000webhostapp.com/"><u>Kalbaliev</u> </a></b>
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