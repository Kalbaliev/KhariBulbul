
@extends('preloader')


@section('content')

    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(/assets/images/login2.jpg);">
        <ul  class="navbar-nav" style="position: absolute;top: 20px;left: 20px;">
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
        <div class="login-box card">
            <div class="card-body" >
                <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" role="form" method="post">
                    {{csrf_field()}}

                    <a class="navbar-brand" href="/">
                        <!-- Logo icon -->

                        <img style="width: 4vw; height: 4vw;float:left" src="../assets/images/logo30.png" alt="homepage" class="light-logo" />

                        <h4 style=" font-family:Cicek; padding: 0; float: left; margin-top: 1.8vw;font-size: 1vw; line-height:.5vw;color:#c7254e;">Khari <br> <b style="font-family:Cicek; padding: 0; float: left;margin-top: .5vw;font-size: 1.5vw; line-height:.5vw; color:#23B46E;">Bulbul</b></h4>
                    </a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="name" placeholder="{{trans('login-page.username')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="{{trans('login-page.password')}}">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg btn-block  " type="submit">{{trans('login-page.sign_in')}}</button>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            {{trans('login-page.dont_have_account')}} <a href="/Qeyd" class="text-primary m-l-5"><b>{{trans('login-page.sign_up')}}</b></a>
                        </div>
                    </div>
                </form>

              
            </div>

            <footer   style="background: #2B2B2B;padding-top: 2vw;clear: both;" class="footer">
                <img src="/assets/images/logo30.png" style=" margin:0;padding: 0 ;width: 40px;height: 40px;" alt="">  <b style="color: white">Khari </b> <b style="color:#00C292">Bulbul</b> <b style="color: white">© 2018 by Kalbaliev </b>
            </footer>
        </div>

    </section>


@endsection

@section('css')

    <link href="/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="/css/register-login.css" rel="stylesheet">
@endsection


@section('js')
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
@endsection