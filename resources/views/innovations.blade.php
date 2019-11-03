
@extends('app')

@section('content')
    <div class="general">
        <h1 style="text-align: center;margin-top: 1vw">{{trans('app-page.innovations')}}</h1>

        <div class="row">
            <div class="col-12">


                <!-- Row -->
                <div class="row innovations">
                    <!-- column -->


                    @foreach($innovations as $innovation)
                    <div class="col-lg-3 col-md-6 innovation">

                        @php

                                $time=strtotime($innovation->created_at);
                                    $month=date("m",$time);



                                if(\LaravelLocalization::setLocale()=='az')

                                {

                                    $header=$innovation->header_title_az;
                                    $text=$innovation->text_az;
                                  setlocale(LC_ALL,'Az');

                                    if($month=='6')
                                    {

                                    $ay="İyn";
                                    }
                                     elseif ($month=='7'){

                                         $ay="İyl";
                                     }
                                     elseif ($month=='8'){

                                         $ay="Avq";
                                     }
                                     else   {

                                     $ay=$innovation->created_at->formatLocalized('%b') ;
                                     }

                                 }
                                elseif (\LaravelLocalization::setLocale()=='en'){

                                   $header=$innovation->header_title_en;
                                   $text=$innovation->text_en;
                                   $ay=$innovation->created_at->formatLocalized('%b') ;
                                }
                        @endphp






                        <div class=" ribbon-vwrapper-reversecard card innovation-card" >
                            <div class="ribbon {{$innovation->ribbon_type_name}} ribbon-vertical-r"><i class="fa fa-{{$innovation->ribbon_icon_name}} fa-2x" aria-hidden="true"></i></div>
                            <div class="ribbon ribbon-info"><i class="fa fa-calendar" aria-hidden="true" style="margin-right: 10px"></i>{{$innovation->created_at->formatLocalized('%d')}} {{$ay}}</div>
                            <img class="card-img-top img-responsive" src="/assets/images/innovations/{{$innovation->photo_slug}}.jpg" alt="{{$innovation->photo_slug}}">
                            <div class="card-body">
                                <h4 style="color:#00C292;font-weight: 900" class="card-title">{{$header}}</h4>
                                <p class="card-text">
                                    {{$text}}
                                </p>

                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    @endforeach
                    <!-- column -->
                </div>


                {{--Column kimi ic ice bitishik hisse--}}
                {{--<div class="row el-element-overlay innovations">--}}
                {{--<div class="col-md-12">--}}

                    {{--<!-- column -->--}}




                {{--<div class="card-columns el-element-overlay">--}}

                    {{--@foreach($innovations as $innovation)--}}
                        {{--<div class="innovation">--}}

                            {{--@php--}}

                                {{--$time=strtotime($innovation->created_at);--}}
                                    {{--$month=date("m",$time);--}}



                                {{--if(\LaravelLocalization::setLocale()=='az')--}}

                                {{--{--}}

                                    {{--$header=$innovation->header_title_az;--}}
                                    {{--$text=$innovation->text_az;--}}
                                  {{--setlocale(LC_ALL,'Az');--}}

                                    {{--if($month=='6')--}}
                                    {{--{--}}

                                    {{--$ay="İyn";--}}
                                    {{--}--}}
                                     {{--elseif ($month=='7'){--}}

                                         {{--$ay="İyl";--}}
                                     {{--}--}}
                                     {{--elseif ($month=='8'){--}}

                                         {{--$ay="Avq";--}}
                                     {{--}--}}
                                     {{--else   {--}}

                                     {{--$ay=$innovation->created_at->formatLocalized('%b') ;--}}
                                     {{--}--}}

                                 {{--}--}}
                                {{--elseif (\LaravelLocalization::setLocale()=='en'){--}}

                                   {{--$header=$innovation->header_title_en;--}}
                                   {{--$text=$innovation->text_en;--}}
                                   {{--$ay=$innovation->created_at->formatLocalized('%b') ;--}}
                                {{--}--}}
                            {{--@endphp--}}






                            {{--<div class=" ribbon-vwrapper-reversecard card innovation-card" >--}}
                                {{--<div class="ribbon {{$innovation->ribbon_type_name}} ribbon-vertical-r"><i class="fa fa-{{$innovation->ribbon_icon_name}} fa-2x" aria-hidden="true"></i><h4>{{$innovation->ribbon_title}}</h4></div>--}}
                                {{--<div class="ribbon ribbon-info"><i class="fa fa-calendar" aria-hidden="true" style="margin-right: 10px"></i>{{$innovation->created_at->formatLocalized('%d')}} {{$ay}}</div>--}}
                                {{--<img class="card-img-top img-responsive" src="/assets/images/innovations/{{$innovation->photo_slug}}.jpg" alt="{{$innovation->photo_slug}}">--}}
                                {{--<div class="card-body">--}}
                                    {{--<h4 style="color:#00C292;font-weight: 900" class="card-title">{{$header}}</h4>--}}
                                    {{--<p class="card-text">--}}
                                        {{--{{$text}}--}}
                                    {{--</p>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- Card -->--}}
                        {{--</div>--}}
                    {{--@endforeach--}}



                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/css/pages/ribbon-page.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/innovations-page.css">
    <!-- page css -->
    <link href="/css/pages/user-card.css" rel="stylesheet">
@endsection


@section('js')

@endsection