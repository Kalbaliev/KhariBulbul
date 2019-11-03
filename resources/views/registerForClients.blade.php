
@extends('app')

@section('content')

    <div class="general">





        <div class="row register-row">
            <div class="col-sm-12">


                <div class="card-body">

                    @php

                   $user_id=\Illuminate\Support\Facades\Auth::user()->id;

                    $client=App\Clients::where('user_id',$user_id)->get();
                    $say=$client->count();
                    $max_say=$client->first()->people_number_human;

                    @endphp
                    @if ($say=='1' && $say<=$max_say)
                    <h1 style="text-align: center"> 2-ci Müştəri -  {{trans('registration-page.register')}}</h1>

                        @elseif ($say=='2' && $say<=$max_say)
                    <h1 style="text-align: center"> 3-cü Müştəri -  {{trans('registration-page.register')}}</h1>
                    @elseif ($say=='3' && $say<=$max_say)
                        <h1 style="text-align: center"> 4-cü Müştəri -  {{trans('registration-page.register')}}</h1>
                     @else
                        <h1 style="text-align: center">Qeydiyyat edə bilməzsiniz!</h1>
                    @endif

                    @if($say<4)
                        <form action="" method="post"  class="form col-sm-12">
                            {{csrf_field()}}
                            <div  style="float: left" class="col-sm-6">


                                {{--AD--}}
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-3 col-form-label">{{trans('registration-page.first_name')}}</label>
                                    <div class="col-9">


                                            <input  name="first_name" class="form-control" type="text" placeholder="" id="example-firstname-input" autofocus>

                                    </div>
                                </div>
                                {{--SOYAD--}}
                                <div class="form-group row">
                                    <label for="example-name-input" class="col-3 col-form-label">{{trans('registration-page.last_name')}}</label>
                                    <div class="col-9">

                                            <input name="last_name" class="form-control" type="text" placeholder="" id="example-lastname-input">

                                    </div>
                                </div>

                                {{--Ata adi--}}
                                <div class="form-group row">
                                    <label for="example-lastname-input" class="col-3 col-form-label">{{trans('registration-page.father_name')}}</label>
                                    <div class="col-9">
                                        <input name="father_name" class="form-control" type="text" placeholder="" id="example-father-input">
                                    </div>
                                </div>

                                {{--FIN--}}
                                <div class="form-group row">
                                    <label for="example-lastname-input" class="col-3 col-form-label">FIN</label>
                                    <div class="col-9">
                                        <input name="FIN" class="form-control" type="text" placeholder="" id="example-FIN-input">
                                    </div>
                                </div>
                                {{--Cins--}}
                                <div class="form-group row">
                                    <label for="inlineFormCustomSelect" class="col-3 col-form-label">{{trans('registration-page.gender')}}</label>
                                    <div class="col-9">
                                        <select name="gender" class="selectpicker" data-style="btn-success" id="inlineFormCustomSelect">


                                            <option value="0">{{trans('registration-page.man')}}</option>
                                            <option value="1">{{trans('registration-page.woman')}}</option>

                                        </select>
                                    </div>
                                </div>
                                {{--Doguldugu yer--}}
                                <div class="form-group row">
                                    <label for="example-birthplace-input" class="col-3 col-form-label">{{trans('registration-page.birth_place')}}</label>
                                    <div class="col-9">
                                        <input name="birthplace" class="form-control" type="text" placeholder="" id="example-birthplace-input">
                                    </div>
                                </div>
                                {{--Doguldugu Tarix--}}

                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-3 col-form-label">{{trans('registration-page.birthday')}}</label>
                                    <div class="col-9">
                                        <input type="text"  name="birthday" class="form-control date-format-without-time" placeholder="Saturday 24 June 2017 - 21:44">
                                    </div>
                                </div>








                            </div>
                            <div  class="col-sm-6 register-image">

                                <button id="submit-register" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('registration-page.registr')}}</button>


                            </div>


                        </form>
                    @endif

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



                    })
                    if(response.veziyyet=='success'){



                    }
                }


            });

        });
    </script>




@endsection