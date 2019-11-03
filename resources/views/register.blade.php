
@extends('preloader')

@section('content')

    <section id="wrapper">

        <div class="login-register" style="background-image:url(/assets/images/login3.jpg);">
            <ul  class="navbar-nav" style="position: absolute;top: 20px;right: 20px;">
                <label id="ForLanguage" title="{{\LaravelLocalization::setLocale()}}" style="float: right;margin-right: 1vw;margin-top: 1.2vw;color:white" for=""><b>{{trans('app-page.change_lang')}}</b></label>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


                    @if(\LaravelLocalization::setLocale()!=$localeCode )
                        <li class="" style="float: right;">
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <img style="width: 60px;" src="/assets/images/logo-for-lang/{{ $properties['regional'] }}.png" alt="{{ $properties['name'] }}">
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
            <div class="login-box card" >
                <div class="card-body">

                    {{--Burda multipart temasi olmasa file yuklenmir sekil zad--}}
                    <form class="form-horizontal form-material" id="loginform" action="{{ route('register') }}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <h3 align="center" class="box-title m-b-20">{{trans('login-page.registration')}}</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required=""  name="name" placeholder="{{trans('login-page.username')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required=""  name="first_name" placeholder="{{trans('login-page.first_name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required=""  name="last_name" placeholder="{{trans('login-page.last_name')}}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control"  type="text" required=""  name="email" placeholder="{{trans('login-page.email_address')}}">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" required type="password" name="password"  placeholder="{{trans('login-page.password')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control"  required type="password" name="password_confirmation" placeholder="{{trans('login-page.retype_password')}}">
                            </div>
                        </div>
                        <div id="button-of-approve">
                            <input class="form-control"   type="hidden" name="status" value="0">
                            <div class="form-group text-center p-b-20"><div class="col-xs-12"><button class="btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">Qeyd ol</button> </div> </div>

                        </div>



                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center"> {{trans('login-page.already_have_account')}} <a href="/Giriş" class="text-info m-l-5"><b>{{trans('login-page.sign_in')}}</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')

    <link href="/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="/css/register-login.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/node_modules/sweetalert2/sweetalert2.min.css">
@endsection


@section('js')




    {{--<!-- Sweet-Alert  -->--}}
    <script src="/assets/node_modules/sweetalert2/jquery.form.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/jquery.validate.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/messages_az.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/sweetalert2.min.js" ></script>
    {{--<!-- Sweet-Alert  -->--}}



@endsection