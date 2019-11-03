
@extends('app')

@section('content')

    <div class="general">





        <div class="row register-row">
            <div class="col-sm-12">


                <div class="card-body">


                        <h1 style="text-align: center">{{trans('ads-page.ads')}}</h1>



                        <form action="" method="post"  class="form col-sm-12">
                            {{csrf_field()}}
                            <div  style="float: left" class="col-sm-6">


                                {{--Title of ads--}}
                                <div class="form-group row">
                                    <label for="example-header-title-az-input" class="col-3 col-form-label">{{trans('ads-page.headerAz')}}</label>
                                    <div class="col-9">
                                        <input  name="header_title_az" class="form-control" type="text" placeholder="" id="example-header-title-az-input" autofocus>
                                    </div>

                                    <label for="example-header-title-en-input" class="col-3 col-form-label">{{trans('ads-page.headerEn')}}</label>
                                    <div class="col-9">
                                        <input  name="header_title_en" class="form-control" type="text" placeholder="" id="example-header-title-en-input" autofocus>
                                    </div>
                                </div>

                                {{--Text of ads--}}
                                <div class="form-group row">
                                    <label for="example-text-az-input" class="col-3 col-form-label">{{trans('ads-page.textAz')}}</label>
                                    <div class="col-9">
                                        <textarea  name="text_az" class="form-control" type="text" placeholder="" id="example-text-az-input" autofocus  cols="20" rows="10"></textarea>

                                    </div>
                                    <label for="example-text-en-input" class="col-3 col-form-label">{{trans('ads-page.textEn')}}</label>
                                    <div class="col-9">
                                        <textarea  name="text_en" class="form-control" type="text" placeholder="" id="example-text-en-input" autofocus  cols="20" rows="10"></textarea>

                                    </div>
                                </div>



                                {{--Genres of ads--}}
                                <div class="form-group row">
                                    <label for="genre" class="col-3 col-form-label">{{trans('registration-page.genres')}}</label>
                                    <div class="col-9">
                                        <select name="genre" class="selectpicker" data-style="btn-success" id="genre">


                                            <option value="0">{{trans('ads-page.shopping')}}</option>
                                            <option value="1">{{trans('ads-page.restaurant')}}</option>
                                            <option value="2">{{trans('ads-page.entertainment')}}</option>
                                            <option value="3">{{trans('ads-page.health')}}</option>
                                            <option value="4">{{trans('ads-page.resort')}}</option>



                                        </select>
                                    </div>
                                </div>
                                {{--Doguldugu yer--}}




                            </div>




                            <div  class="col-sm-6 register-image">
                                <img  id="ads-img" src="/assets/images/innovations/ads.jpg" alt="">
                                <button id="submit-register" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('ads-page.create')}}</button>


                            </div>

                        </form>


                </div>

            </div>

        </div>


    </div>

@endsection


@section('css')

    <link href="/assets/node_modules/icheck/skins/all.css" rel="stylesheet">
    <link href="/css/pages/form-icheck.css" rel="stylesheet">
    <link href="/css/register.css" rel="stylesheet">
    <link href="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    {{--Select option--}}


    <link rel="stylesheet" href="/assets/node_modules/sweetalert2/sweetalert2.min.css">

    {{--DAteTimepicker--}}
    <link href="/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

@endsection

@section('js')




    <!-- Plugin JavaScript -->
    <script src="/assets/node_modules/moment/moment-locales.js"></script>
    <script src="/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    {{--Bootrtrap MAterial Datepicker--}}
    <script>

        {{--Bootrtrap MAterial Datepicker ucun --}}
                $('.date-format-without-time').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD',time: false});




        $('.date-format').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD H:mm:00 - dddd', minDate : new Date() });

        $('#date-end').bootstrapMaterialDatePicker({ weekStart : 0 });
        $('#date-start').bootstrapMaterialDatePicker({ weekStart : 0 }).on('change', function(e, date)
        {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
        });

    </script>


    {{--<!-- Sweet-Alert  -->--}}
    <script src="/assets/node_modules/sweetalert2/jquery.form.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/jquery.validate.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/messages_az.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/sweetalert2.min.js" ></script>
    {{--<!-- Sweet-Alert  -->--}}
    <script>


        $(document).ready(function ()

        {

            $('form').validate();//mesajin cixmasi demekdir. bu xana mutleq dolmalidir
            $('form').ajaxForm({ // formu ajax form kimi gondermeyi istiyirk

                beforeSubmit:function(){
                    swal({

                        title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                        text: 'Lütfən gözləyin blog əlavə edilir',
                        showConfirmButton:false
                    })

                },

                success: function (response) {


                    swal({
                        type: response.veziyyet,
                        title: response.basliq,
                        html: response.altyazi,
                        confirmButtonColor: '#00C292',



                    }).then(function () {
                        if(response.veziyyet=='success'){

                            window.location.href="/Yeniliklər";

                        }
                    });

                }


            });

        });
    </script>




@endsection