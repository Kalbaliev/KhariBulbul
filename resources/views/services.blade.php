
@extends('app')

@section('content')

    <div class="general">

        <h1 style="text-align: center;margin-top: 1vw;">{{trans('services.title')}}</h1>
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-dark">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Khari Bulbul</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Bələdçi xidməti <i class="fa fa-male" aria-hidden="true"></i></h3>
                        <p class="card-text">Şamaxı şəhərini xüsusi savada malik əməkdaşlarımız tərəfindən gəzməyə hazır olun!</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal-guider"  class="btn btn-primary">Rezerv et!</a>
                        <!-- sample modal content -->
                        <div id="responsive-modal-guider" class="modal fade" style="color:black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" >Bələdçi rezervasiyası</h4>
                                        <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="guide">
                                            {{csrf_field()}}
                                            {{--giris vaxti--}}
                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-3 col-form-label">{{trans('registration-page.check_in')}}</label>
                                                <div class="col-9">

                                                    <input  id="date-start" type="text" name="check_in"  class="form-control date-format" placeholder="Saturday 24 June 2017 - 21:44">
                                                </div>

                                            </div>
                                            {{--cixis vaxti--}}
                                            <div class="form-group row">

                                                <label for="example-tel-input" class="col-3 col-form-label">{{trans('registration-page.check_out')}}</label>
                                                <div class="col-9">
                                                    <input id="date-end"  type="text"  name="check_out" class="form-control date-format" placeholder="Saturday 24 June 2017 - 21:44">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            <input type="hidden" name="service_status" value="0">
                                            <div class="modal-footer">
                                                <button id="submit-register-guide" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Khari Bulbul</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Nəqliyyat <i class="fa fa-bus" aria-hidden="true"></i></h3>
                        <p class="card-text">Gəzintiləriniz üçün ürəyinizcə nəqliyyat vasitələrini əldə edin.</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal-car"  class="btn btn-danger">Rezerv et!</a>
                        <!-- sample modal content -->
                        <div id="responsive-modal-car" class="modal fade" style="color:black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" >Nəqliyyat rezervasiyası</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="transport">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            <input type="hidden" name="service_status" value="1">
                                            <div class="modal-footer">
                                                <button id="submit-register-transport" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Khari Bulbul</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Qolf <i class="fa fa-trophy" aria-hidden="true"></i></h3>
                        <p class="card-text">Kompleksimzidə yerləşən golf meydançasından həzz alın.</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal-golf"  class="btn btn-dark">Rezerv et!</a>
                        <!-- sample modal content -->
                        <div id="responsive-modal-golf" class="modal fade" style="color:black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" >Qolf rezervasiyası</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="golf">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            <input type="hidden" name="service_status" value="2">
                                            <div class="modal-footer">
                                                <button id="submit-register-golf" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Khari Bulbul</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Spa & Sağlamlıq <i class="fa fa-heartbeat" aria-hidden="true"></i></h3>
                        <p class="card-text">Sizin sağlamlığınız üçün hər şey burada.</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal-spa"  class="btn btn-info">Rezerv et!</a>
                        <!-- sample modal content -->
                        <div  id="responsive-modal-spa" class="modal fade" style="color:black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Spa & Sağlamlıq rezervasiyası</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="health">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            <input type="hidden" name="service_status" value="3">
                                            <div class="modal-footer">
                                                <button id="submit-register-health" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Khari Bulbul</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Restoran <i class="fa fa-cutlery" aria-hidden="true"></i></h3>
                        <p class="card-text">İstirahət mərkəzimizin özünəməxsus mətbəxindən zövq alın!</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal-restaurant"  class="btn btn-success">Rezerv et!</a>
                        <!-- sample modal content -->
                        <div id="responsive-modal-restaurant" class="modal fade" style="color:black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" >Restoran rezervasiyası</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="restaurant">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            <input type="hidden" name="service_status" value="4">
                                            <div class="modal-footer">
                                                <button id="submit-register-restaurant" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Khari Bulbul</h4></div>
                    <div class="card-body">
                        <h3 class="card-title">Gecə klubu <i class="fa fa-ticket" aria-hidden="true"></i></h3>
                        <p class="card-text">Musiqi və auranın tək məkanı sizlərin istifadəsində</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal-disco"  class="btn btn-warning">Rezerv et!</a>
                        <!-- sample modal content -->
                        <div id="responsive-modal-disco" class="modal fade" style="color:black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" >Gecə klubu rezervasiyası</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="disco">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            <input type="hidden" name="service_status" value="5">
                                            <div class="modal-footer">
                                                <button id="submit-register-disco" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>

                                            </div>
                                        </form>
                                    </div>
                                    {{--<div class="modal-footer">--}}
                                        {{--<button id="submit-register-disco" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('services.add')}}</button>--}}
                                        {{--<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('services.close')}}</button>--}}
                                      {{----}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('css')
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

            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date)


            var tomorrov=new Date(date+86400000);

            $('#date-end').val('');
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', tomorrov);


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

                            window.location.href="/";

                        }
                    });




                }


            });

        });
    </script>

@endsection