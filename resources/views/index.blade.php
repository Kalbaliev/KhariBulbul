
@extends('app')

@section('content')

    <div class="general">

            <div  class="titleBack">

                <img id="titleBack" src="../assets/images/5555.jpg" alt="">

            </div>
        @php
            $user_status=Auth::user()->status;
        @endphp
        @if($user_status!='9' && $user_status!='0')

            <div style="margin-top: 10px" class="row">
                <div class="col-lg-6 col-md-6">
                    <div style="border:1px solid green;" class="card static-reserve-left">


                        <div class="card-body analytics-info">

                            <ul style="float: left;" class="list-inline two-part">
                                <li style="float: left; ">
                                    <div id="sparklinedash"></div>
                                </li>

                            </ul>

                            <h4 style="float: left;padding-top: 2.5vw;" class="card-title"><i  class="ti-arrow-up text-success"></i>  <span class="text-success">38</span></i>&nbsp{{trans('index-page.check_in_register')}}</h4>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6">
                    <div style="border:1px solid green;margin-right: 10px" class="card static-reserve-right">
                        <div class="card-body analytics-info">

                            <ul style="float: left;" class="list-inline two-part">
                                <li style="float: left; ">
                                    <div id="sparklinedash4"></div>

                                </li>



                            </ul>
                            <h4 style="float: left;padding-top: 2.5vw;" class="card-title"><i   class="ti-arrow-down text-danger"> <span class="text-danger">19</span></i>&nbsp{{trans('index-page.check_out_register')}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div  class="row">
                <!-- Column -->
                <div  class="col-lg-4 col-md-6">
                    <div style="background: #139573;color:white" class="card static-hotel static-hotel-left">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('index-page.clients')}}</h5>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="display-6"><i class="icon-people "></i></div>
                                <div class="ml-auto">
                                    <h1>{{$client}}/235</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="col-lg-4 col-md-6">
                    <div style="background: purple;color:white" class="card static-hotel">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('index-page.rooms')}}</h5>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="display-6"><i class="icon-people "></i></div>
                                <div class="ml-auto">
                                    <h1>{{$room}}/100</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="col-lg-4 col-md-6">
                    <div style="background: gold;color:white" class="card static-hotel static-hotel-right">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('index-page.rating')}}</h5>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="display-6"><i class="icon-people "></i></div>
                                <div class="ml-auto">
                                    <h1>9.1/10</h1></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div  class="col-lg-4 col-md-6">--}}
                    {{--<div style="background: purple;color:white;" class="card static-hotel">--}}
                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Otaqlar</h5>--}}
                            {{--<div class="d-flex no-block align-items-center m-t-20">--}}
                                {{--<div class="display-6"><i class="mdi mdi-hotel "></i></div>--}}
                                {{--<div class="ml-auto">--}}
                                    {{--<h1>215/778</h1></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div  class="col-lg-4 col-md-6">--}}
                    {{--<div style="background:orange;color:white;" class="card static-hotel static-hotel-right">--}}
                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Reyting</h5>--}}
                            {{--<div class="d-flex no-block align-items-center m-t-20">--}}
                                {{--<div class="display-6"><i class="mdi mdi-star-half"></i></div>--}}
                                {{--<div class="ml-auto">--}}
                                    {{--<h1>9.5/10</h1></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!-- Column -->

                <!-- Column -->
            </div>
        @endif
            <div style="margin-top: 10px;"  class="row">
                <div class="col-lg-4">
                    <div style="border:2px solid #139573; background: #353C48;color:white;" class="card weather-card">
                        <div  class="card-body">
                            <h4 class="card-title m-b-0">{{trans('index-page.weather')}}</h4>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="d-flex no-block align-items-center">
                                <span>
                                    <h2 class="">{{trans('index-page.today_weather')}}</h2>
                                    <h3 class="">
                                        @if(\LaravelLocalization::setLocale()=='az')
                                        {{$today[7]}}
                                        @endif
                                    </h3>
                                    <small>
                                @php

                                     $aylar_en=array("January","February","March","April","May","June","July","August","September","October","November","December");
                                     $aylar_az=array("Yanvar","Fevral","Mart","Aprel","May","İyun","İyul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr");
                                     $date_now=date("d M Y");
                                     $hefte_numb=array("1","2","3","4","5","6","7");
                                     $hefte_en=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
                                     $hefte_az=array("Bazar ertəsi","Çərşənbə axşamı","Çərşənbə","Cümə axşamı","Cümə","Şənbə","Bazar");
                                     $hefte_qisa_en=array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                                     $hefte_qisa_az=array("Bzr ert.","Çrş axş.","Çrş","Cüm axş.","Cüm","Şnb","Bzr");
                                     $date_week=date("N");

                                        if(\LaravelLocalization::setLocale()=='az')
                                                {
                                             echo str_replace($aylar_en,$aylar_az,$date_now)." | ".str_replace( $hefte_numb, $hefte_az,$date_week);
                                        }
                                        else if(\LaravelLocalization::setLocale()=='en'){
                                                      echo $date_now." | ".str_replace( $hefte_numb, $hefte_en,$date_week);
                                        }
                                @endphp

                                    </small></span>

                                <div class="ml-auto">
                                    <canvas class="{{$today[8]}}" width="44" height="44"></canvas> <span class="display-6">{{$today[0]}}&deg;</span> </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table no-border">
                                        <tbody>
                                        <tr>
                                            <td>{{trans('index-page.feeling_weather')}}</td>
                                            <td class="font-medium">{{$today[1]}}&deg;</td>
                                        </tr>
                                        <tr>
                                            <td>{{trans('index-page.wind_weather')}}</td>
                                            <td class="font-medium">

                                                @php

                                                if(\LaravelLocalization::setLocale()=='en'){

                                               $ikisozlu=substr($today[2],0,12);
                                               $birsozlu=substr($today[2],0,6);


                                               $ikisozlu_davam=substr($today[2],13);
                                               $birsozlu_davam=substr($today[2],6);

                                                if($birsozlu=='Cənub'){

                                                $today[2]='South'.$birsozlu_davam;
                                                        if($ikisozlu=='Cənub-şərq' ){
                                                            $today[2]='South-East'.$ikisozlu_davam;
                                                        }
                                                        else if ($ikisozlu=='Cənub-qərb'){
                                                            $today[2]='South-West'.$ikisozlu_davam;
                                                        }
                                                 }
                                                 else if($birsozlu=='Şimal'){

                                                $today[2]= 'North'.$birsozlu_davam;;
                                                        if($ikisozlu=='Şimal-şərq' ){
                                                            $today[2]='North-East'.$ikisozlu_davam;
                                                        }
                                                        else if ($ikisozlu=='Şimal-qərb'){
                                                            $today[2]='North-West'.$ikisozlu_davam;
                                                        }
                                                 }


                                                 echo $today[2];
                                               }
     if(\LaravelLocalization::setLocale()=='az'){
                                                echo $today[2];
                                                }
                                                @endphp

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{trans('index-page.humidity_weather')}} </td>
                                            <td class="font-medium">{{$today[3]}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table no-border">
                                        <tbody>
                                        <tr>
                                            <td> {{trans('index-page.pressure_weather')}}</td>
                                            <td class="font-medium">
                                              @php

                                                  if(\LaravelLocalization::setLocale()=='en'){

                                                      echo str_replace ("mm.c.s","mb",$today[4]);
                                                  }
                                                  else{
                                                      echo $today[4];
                                                  }

                                              @endphp


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{trans('index-page.sunrise_weather')}} </td>
                                            <td class="font-medium">{{$today[5]}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{trans('index-page.sunset_weather')}}</td>
                                            <td class="font-medium">{{$today[6]}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>
                                        @php        $date_week=$date_week+1;
                                        if($date_week>7){$date_week=$date_week-7;}

                                                  if(\LaravelLocalization::setLocale()=='az')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_az,$date_week);
                                                  }
                                                  else if(\LaravelLocalization::setLocale()=='en')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_en,$date_week);
                                                  }
                                        @endphp
                                    </h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="{{$logos[0]}}" width="30" height="30"></canvas>
                                    </div>
                                    <h5>{{$derece_week[0]}}&deg;</h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>
                                        @php        $date_week=$date_week+1;
                                        if($date_week>7){$date_week=$date_week-7;}

                                                  if(\LaravelLocalization::setLocale()=='az')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_az,$date_week);
                                                  }
                                                  else if(\LaravelLocalization::setLocale()=='en')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_en,$date_week);
                                                  }
                                        @endphp
                                    </h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="{{$logos[1]}}" width="30" height="30"></canvas>
                                    </div>
                                    <h5>{{$derece_week[1]}}&deg;</h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>
                                        @php        $date_week=$date_week+1;
                                        if($date_week>7){$date_week=$date_week-7;}

                                                  if(\LaravelLocalization::setLocale()=='az')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_az,$date_week);
                                                  }
                                                  else if(\LaravelLocalization::setLocale()=='en')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_en,$date_week);
                                                  }
                                        @endphp
                                    </h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="{{$logos[2]}}" width="30" height="30"></canvas>
                                    </div>
                                    <h5>{{$derece_week[2]}}&deg;</h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>
                                        @php        $date_week=$date_week+1;
                                        if($date_week>7){$date_week=$date_week-7;}

                                                  if(\LaravelLocalization::setLocale()=='az')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_az,$date_week);
                                                  }
                                                  else if(\LaravelLocalization::setLocale()=='en')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_en,$date_week);
                                                  }
                                        @endphp
                                    </h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="{{$logos[3]}}" width="30" height="30"></canvas>
                                    </div>
                                    <h5>{{$derece_week[3]}}&deg;</h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>
                                        @php        $date_week=$date_week+1;
                                        if($date_week>7){$date_week=$date_week-7;}

                                                  if(\LaravelLocalization::setLocale()=='az')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_az,$date_week);
                                                  }
                                                  else if(\LaravelLocalization::setLocale()=='en')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_en,$date_week);
                                                  }
                                        @endphp
                                    </h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="{{$logos[4]}}" width="30" height="30"></canvas>
                                    </div>
                                    <h5>{{$derece_week[4]}}&deg;</h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                <h5>
                                    @php        $date_week=$date_week+1;
                                        if($date_week>7){$date_week=$date_week-7;}
                                                  if(\LaravelLocalization::setLocale()=='az')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_az,$date_week);
                                                  }
                                                  else if(\LaravelLocalization::setLocale()=='en')
                                                  {
                                                     echo  str_replace($hefte_numb,$hefte_qisa_en,$date_week);
                                                  }
                                    @endphp
                                </h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="{{$logos[5]}}" width="30" height="30"></canvas>
                                    </div>
                                    <h5>{{$derece_week[5]}}&deg;</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    @php



                        $time1=strtotime($innovationfirst->created_at);
                        $time2=strtotime($innovationsecond->created_at);
                        $time3=strtotime($innovationthird->created_at);
                            $month1=date("m",$time1);
                            $month2=date("m",$time2);
                            $month3=date("m",$time3);

                        if(\LaravelLocalization::setLocale()=='az')

                        {

                            $header1=$innovationfirst->header_title_az;
                            $text1=$innovationfirst->text_az;
                            $header2=$innovationsecond->header_title_az;
                            $text2=$innovationsecond->text_az;
                            $header3=$innovationthird->header_title_az;
                            $text3=$innovationthird->text_az;

                          setlocale(LC_ALL,'Az');

                            if($month1=='6')
                            {

                            $ay1="İyn";
                            }
                             elseif ($month1=='7'){

                                 $ay1="İyl";
                             }
                             elseif ($month1=='8'){

                                 $ay1="Avq";
                             }
                             else   {

                             $ay1=$innovationfirst->created_at->formatLocalized('%b') ;
                             }

                            if($month2=='6')
                            {

                            $ay2="İyn";
                            }
                             elseif ($month2=='7'){

                                 $ay2="İyl";
                             }
                             elseif ($month2=='8'){

                                 $ay2="Avq";
                             }
                             else   {

                             $ay2=$innovationsecond->created_at->formatLocalized('%b') ;
                             }

                               if($month3=='6')
                            {

                            $ay3="İyn";
                            }
                             elseif ($month3=='7'){

                                 $ay3="İyl";
                             }
                             elseif ($month3=='8'){

                                 $ay3="Avq";
                             }
                             else   {

                             $ay3=$innovationsecond->created_at->formatLocalized('%b') ;
                             }



                         }
                        elseif (\LaravelLocalization::setLocale()=='en'){

                            $header1=$innovationfirst->header_title_en;
                            $text1=$innovationfirst->text_en;
                            $header2=$innovationsecond->header_title_en;
                            $text2=$innovationsecond->text_en;
                            $header3=$innovationthird->header_title_en;
                            $text3=$innovationthird->text_en;
                           $ay1=$innovationfirst->created_at->formatLocalized('%b') ;
                           $ay2=$innovationsecond->created_at->formatLocalized('%b') ;
                           $ay3=$innovationthird->created_at->formatLocalized('%b') ;
                        }
                    @endphp





                    <div class="card bg-inverse inno">
                        <div class="card-body">
                            <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active flex-column">
                                        <i class="fa fa-{{$innovationfirst->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationfirst->created_at->formatLocalized('%d')}} {{$ay1}}</p>
                                        <h3 class="text-white">{{$header1}}<br>
                                        </h3>

                                    </div>
                                    <div class="carousel-item flex-column">
                                        <i class="fa fa-{{$innovationfirst->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationfirst->created_at->formatLocalized('%d')}} {{$ay1}}</p>
                                        <h3 class="text-white">{{$header1}}<br>
                                        </h3>

                                    </div>
                                    <div class="carousel-item flex-column">
                                        <i class="fa fa-{{$innovationfirst->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationfirst->created_at->formatLocalized('%d')}} {{$ay1}}</p>
                                        <h3 class="text-white">{{$header1}}<br>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-primary inno">
                        <div class="card-body">
                            <div id="myCarousel2" class="carousel slide vert" data-ride="carousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active flex-column">
                                        <i class="fa fa-{{$innovationsecond->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationsecond->created_at->formatLocalized('%d')}} {{$ay2}}</p>
                                        <h3 class="text-white"> {{$header2}}<br>
                                        </h3>

                                    </div>
                                    <div class="carousel-item flex-column">
                                        <i class="fa fa-{{$innovationsecond->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationsecond->created_at->formatLocalized('%d')}} {{$ay2}}</p>
                                        <h3 class="text-white">{{$header2}}<br>
                                        </h3>

                                    </div>
                                    <div class="carousel-item flex-column">
                                        <i class="fa fa-{{$innovationsecond->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationsecond->created_at->formatLocalized('%d')}} {{$ay2}}</p>
                                        <h3 class="text-white">{{$header2}}<br>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-cyan inno">
                        <div class="card-body">
                            <div id="myCarousel3" class="carousel slide " data-ride="carousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active flex-column">
                                        <i class="fa fa-{{$innovationthird->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationthird->created_at->formatLocalized('%d')}} {{$ay3}}</p>
                                        <h3 class="text-white"> {{$header3}}<br>
                                        </h3>

                                    </div>
                                    <div class="carousel-item flex-column">
                                        <i class="fa fa-{{$innovationthird->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationthird->created_at->formatLocalized('%d')}} {{$ay3}}</p>
                                        <h3 class="text-white">{{$header3}}<br>
                                        </h3>

                                    </div>
                                    <div class="carousel-item flex-column">
                                        <i class="fa fa-{{$innovationthird->ribbon_icon_name}} fa-2x text-white"></i>
                                        <p class="text-white">{{$innovationthird->created_at->formatLocalized('%d')}} {{$ay3}}</p>
                                        <h3 class="text-white">{{$header3}}<br>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">


        <div class="card birthday-card">
                        <div class="card-body">
                            <h5 class="card-title">{{trans('index-page.birthdays')}}</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                               

                                    @foreach($clients_forbithday as $birthday_client)

                                        @if($birthday_client->status==0)
                                                @php


                                                    $check_in=  $birthday_client->check_in;
                                                    $check_in=Carbon\Carbon::parse($check_in)->format('m-d');

                                                $check_out=  $birthday_client->check_out;
                                                $check_out=Carbon\Carbon::parse($check_out)->format('m-d');

                                                $birthday=  $birthday_client->birthday;
                                                $birthday=Carbon\Carbon::parse($birthday)->format('m-d');

                                                $adgunu=$birthday_client->birthday;
                                                $adgunu=Carbon\Carbon::parse($adgunu)->format('Y');

                                                    $datenow=Carbon\Carbon::now();
                                                    $datenow=Carbon\Carbon::parse($datenow)->format('Y');


                                                    $old=($datenow-$adgunu);
                                                @endphp
                                            @if($check_in<$birthday && $check_out>$birthday)

                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="/uploads/img/users/resized/profile1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>{{$birthday_client->first_name.' '.$birthday_client->last_name}} </h5> <span class="mail-desc">{{trans('index-page.room_no')}} - {{$birthday_client->roomFunc->room_name}}</span> <span class="time">{{$birthday_client->birthday}} &nbsp;&nbsp;<span style="color:red;font-weight: 800"> {{$old}} {{trans('index-page.old')}}</span></span> </div>
                                                </a>
                                            
                                            @else

                                            
                       
                    
                                                <h3 style="color:#FB9678">{{trans('index-page.no_birthday')}}</h3>

                                            @endif

                                        @else

                                            <h3 style="color:#FB9678">{{trans('index-page.no_birthday')}}</h3>
                                  
                                        @endif

                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/index-page.css">

@endsection


@section('js')
    <script src="/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Chart JS -->
    <script src="/assets/node_modules/sparkline/jquery.charts-sparkline.js"></script>
    <!--Sky Icons JavaScript -->
   <script>
   if ((screen.height>319 && screen.height<767)&&(screen.width>319 && screen.width<767)) {
        $('#sparklinedash').sparkline([{{$count1}},{{$count2}},{{$count3}},{{$count4}},{{$count5}},{{$count6}},{{$count7}}], {
               type: 'bar',
               height: '150',
               barWidth: '40',
               resize: true,
               barSpacing: '5',
               barColor: '#00c292'
           });
        $('#sparklinedash4').sparkline([{{$count1_out}},{{$count2_out}},{{$count3_out}},{{$count4_out}},{{$count5_out}},{{$count6_out}},{{$count7_out}}], {
               type: 'bar',
               height: '150',
               barWidth: '40',
               resize: true,
               barSpacing: '5',
               barColor: '#ff4d4d'
           });
        }
        else{
            $('#sparklinedash').sparkline([{{$count1}},{{$count2}},{{$count3}},{{$count4}},{{$count5}},{{$count6}},{{$count7}}], {
               type: 'bar',
               height: '150',
               barWidth: '20',
               resize: true,
               barSpacing: '5',
               barColor: '#00c292'
           });
           $('#sparklinedash4').sparkline([{{$count1_out}},{{$count2_out}},{{$count3_out}},{{$count4_out}},{{$count5_out}},{{$count6_out}},{{$count7_out}}], {
               type: 'bar',
               height: '150',
               barWidth: '20',
               resize: true,
               barSpacing: '5',
               barColor: '#ff4d4d'
           });
        }

    
   </script>
                    
    <script src="/assets/node_modules/skycons/skycons.js"></script>
    <!--morris JavaScript -->
    <script src="/assets/node_modules/raphael/raphael-min.js"></script>
    <!-- Chart JS -->
    <script src="/js/dashboard4.js"></script>
@endsection