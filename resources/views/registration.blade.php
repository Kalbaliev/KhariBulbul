
@extends('app')

@section('content')

    <div class="general">





                <div class="row register-row">
                    <div class="col-sm-12">


                            <div class="card-body">
                                <h1 style="text-align: center">{{trans('registration-page.register')}}</h1>
                                <form action="" method="post"  class="form col-sm-12">
                                    {{csrf_field()}}
                                        <div  style="float: left" class="col-sm-6">


                                            {{--AD--}}
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-3 col-form-label">{{trans('registration-page.first_name')}}</label>
                                                    <div class="col-9">

                                                        @if(\Illuminate\Support\Facades\Auth::user()->status==0)
                                                        <input  name="first_name" class="form-control"  type="text" placeholder="" id="example-firstname-input" autofocus  value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"  readonly>
                                                        @else
                                                        <input  name="first_name" class="form-control" type="text" placeholder="" id="example-firstname-input" autofocus>
                                                        @endif
                                                    </div>
                                                </div>
                                            {{--SOYAD--}}
                                                <div class="form-group row">
                                                    <label for="example-name-input" class="col-3 col-form-label">{{trans('registration-page.last_name')}}</label>
                                                    <div class="col-9">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->status==0)
                                                            <input name="last_name" class="form-control" type="text" placeholder="" id="example-lastname-input" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}"  readonly>
                                                            @else
                                                            <input name="last_name" class="form-control" type="text" placeholder="" id="example-lastname-input">
                                                            @endif
                                                    </div>
                                                </div>

                                            {{--Ata adi--}}
                                                <div class="form-group row">
                                                    <label for="example-lastname-input" class="col-3 col-form-label">{{trans('registration-page.father_name')}}</label>
                                                    <div class="col-9">
                                                        <input name="father_name" class="form-control" type="text" placeholder="" id="example-father-input">
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
                                                        <input name="birth_place" class="form-control" type="text" placeholder="" id="example-birthplace-input">
                                                    </div>
                                                </div>
                                            {{--Doguldugu FIN--}}
                                            <div class="form-group row">
                                                <label for="example-FIN-input" class="col-3 col-form-label">{{trans('registration-page.FIN')}}</label>
                                                <div class="col-9">
                                                    <input name="FIN" class="form-control" type="text" placeholder="" id="example-FIN-input">
                                                </div>
                                            </div>
                                            {{--Doguldugu Tarix--}}

                                            <div class="form-group row">
                                                <label for="example-tel-input" class="col-3 col-form-label">{{trans('registration-page.birthday')}}</label>
                                                <div class="col-9">
                                                    <input type="text"  name="birthday" class="form-control date-format-without-time" placeholder="Saturday 24 June 2017 - 21:44">
                                                </div>
                                            </div>
                                            {{--Telefon Nomresi--}}
                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-3 col-form-label">{{trans('registration-page.phone_number')}}</label>
                                                    <div class="col-9">
                                                        <input name="phone" class="form-control" type="tel" placeholder="+994775211496" value id="example-tel-input">
                                                    </div>
                                                </div>
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
                                            {{--otaq vezyeti (adi,vip)--}}
                                                <div class="form-group row">

                                                            <label for="example-status-input" class="col-3 col-form-label">{{trans('registration-page.room_situation')}}</label>
                                                            <div class="col-9">

                                                                <div class="input-group" id="example-status-input">

                                                                    <ul style="padding: 0;margin: 0" class="icheck-list">
                                                                        <li style="float: left;">
                                                                            <input price="20" type="radio" value="0" class="check" id="stat-square-radio-1" name="stat-square-radio" checked data-radio="iradio_square-green">
                                                                            <label>{{trans('registration-page.ordinary')}}</label>
                                                                        </li>
                                                                        <li  style="float: left; margin-left: 5px">
                                                                            <input price="50" type="radio" value="1" class="check" id="stat-square-radio-2" name="stat-square-radio"  data-radio="iradio_square-green">
                                                                            <label >VİP</label>
                                                                        </li>

                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                            {{--Nefer sayi otagin--}}
                                                <div class="form-group row">

                                                    <label for="example-customer-input" class="col-3 col-form-label">{{trans('registration-page.room_person_numb')}}</label>
                                                    <div class="col-9">
                                                        <div class="input-group" id="example-customer-input">

                                                            <ul style="padding: 0;margin: 0" class="icheck-list">
                                                                <li style="float: left; ">
                                                                    <input price="20" type="radio" value="1" class="check" id="square-radio-1" name="square-radio" checked data-radio="iradio_square-green">
                                                                    <label>1 {{trans('registration-page.room_person')}}</label>
                                                                </li>
                                                                <li  style="float: left; ">
                                                                    <input price="35" type="radio" value="2" class="check" id="square-radio-2" name="square-radio"  data-radio="iradio_square-green">
                                                                    <label >2 {{trans('registration-page.room_person')}}</label>
                                                                </li>
                                                                <li  style="float: left;">
                                                                    <input price="45" type="radio" value="3" class="check" id="square-radio-3" name="square-radio"  data-radio="iradio_square-green">
                                                                    <label >3 {{trans('registration-page.room_person')}}</label>
                                                                </li>
                                                                <li  style="float: left; ">
                                                                    <input price="55" type="radio" value="4" class="check" id="square-radio-4" name="square-radio"  data-radio="iradio_square-green">
                                                                    <label >4 {{trans('registration-page.room_person')}}</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            {{--qalacaq adamlar--}}
                                                <div class="form-group row">
                                                    <label for="example-tag-input" class="col-3 col-form-label">{{trans('registration-page.who_is_stay')}}</label>
                                                    <div class="col-9">

                                                        <input name="peoples" type="text"  data-role="tagsinput" placeholder="{{trans('registration-page.add')}}" id="example-tag-input">
                                                    </div>


                                                </div>
                                            {{--xidmet servis ( premium ,biznes)--}}
                                                <div class="form-group row">

                                                    <label for="example-services-input" class="col-3 col-form-label">{{trans('registration-page.service')}}</label>
                                                    <div class="col-9">

                                                        <div class="input-group" id="example-services-input">

                                                            <ul style="padding: 0;margin: 0" class="icheck-list">
                                                                <li style="float: left;">
                                                                    <input price="10"  type="radio" class="check" id="serv-square-radio-1" name="services" checked data-radio="iradio_square-green" value="0">
                                                                    <label>General</label>
                                                                </li>
                                                                <li  style="float: left; ">
                                                                    <input price="25" type="radio" class="check" id="serv-square-radio-2" name="services"  data-radio="iradio_square-green" value="1">
                                                                    <label>Premium</label>
                                                                </li>
                                                                <li  style="float: left; ">
                                                                    <input price="50" type="radio" class="check" id="serv-square-radio-3" name="services"   data-radio="iradio_square-green" value="2">
                                                                    <label >Buisness</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                         </div>




                                         <div  class="col-sm-6 register-image">
                                             <div class="form-group row">

                                                 <label for="example-room-input" class="col-3 col-form-label">{{trans('registration-page.room')}}</label>
                                                 <div id="example-room-input" class="col-9">


                                                     <select  name="room_no" class="selectpicker" data-style="btn-success">

                                                         @foreach($floors as $floor)
                                                             <optgroup label="{{$floor->floor}} {{trans('registration-page.floor')}}">

                                                                 Bura evvel asagidaki kimiydi indi  bele qalanda pramoy otaqlari siralamir
                                                                 @foreach($first_rooms as $room)
                                                                     @if($room->floor==$floor->floor && $room->busy_status==0)

                                                                         <option value="{{$room->id}}">{{$room->room_name}}</option>

                                                                     @endif
                                                                 @endforeach
                                                             </optgroup>
                                                         @endforeach
                                                     </select>

                                                 </div>



                                             </div>
                                             <div class="form-group row">
                                                 <label class="col-3 col-form-label">{{trans('registration-page.people_stay')}}</label>
                                                 <div class="col-9">
                                                     <select  name="people_number_human" class="selectpicker" data-style="btn-success">

                                                         <option value="1">{{trans('registration-page.choose_person')}}</option>
                                                         <option value="1">1 {{trans('registration-page.person')}}</option>
                                                         <option value="2">2 {{trans('registration-page.person')}}</option>
                                                         <option value="3">3 {{trans('registration-page.person')}}</option>
                                                         <option value="4">4 {{trans('registration-page.person')}}</option>
                                                     </select>
                                                 </div>
                                             </div>

                                                <img id="reception-img" src="/assets/images/reception.jpg" alt="">
                                             <button id="submit-register" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('registration-page.registr')}}</button>
                                                {{--<input id="submit-register" class="waves-effect waves-light" type="submit" value="Qeyd et">--}}
                                             {{--Qiymet--}}

                                         </div>

                                    <input name="payment" id="hiddenPrice" type="hidden">
                                    <input name="peoplenumb" id="peoplenumb" type="hidden">
                                </form>

                            </div>

                    </div>
                    <div  class="form-group row price-of-day">

                        <h3 align="">{{trans('registration-page.price')}} -    {{trans('registration-page.for_day')}}:&nbsp&nbsp</h3>
                        <div >

                            <div >
                                @php
                                    if(\LaravelLocalization::setLocale()=='en'){
                                            $labelCurrency="30 USD";
                                     }
                                    else{
                                         $labelCurrency="50 AZN";
                                     }

                                @endphp
                                <h3  ><b id="price-label" style="color:red;font-weight: 900"> {{$labelCurrency}}</b></h3>

                            </div>
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





    <script src="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/node_modules/icheck/icheck.min.js"></script>
    <script src="/assets/node_modules/icheck/icheck.init.js"></script>



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


    <script>

        $(document).ready(function () {

            var dil= document.getElementById("ForLanguage").title;

//
//            var datePicker = $('#date-picker-example');
//            datePicker.change(function(e){
//            var date_text= datePicker.val();
//             var date=date_text.substr(0, 19);
////          Burda uje giris vaxtini goturmusem
//            })

            $('.iCheck-helper').click(function(){

                var  price_room_sts=parseInt($('input[name="stat-square-radio"]:checked').attr('price'));
                var  price_service_sts=parseInt($('input[name="services"]:checked').attr('price'));
                var  price_people_number=parseInt($('input[name="square-radio"]:checked').attr('price'));


                var  price=0;

                var  price_az=0;
                var price_dollar=0;

                var price_result="Pul";

                     price_az=price+price_people_number+price_room_sts+price_service_sts;
                     price_dollar=(price_dollar+price_people_number+price_room_sts+price_service_sts)*0.58821;
                     price_dollar=Math.ceil(price_dollar);


                     if(dil=='az'){

                         price=price_az;
                          price_result=price+" AZN ";
                     }
                     else{
                         price=price_dollar;
                         price_result=price+" USD ";
                     }









                $('#price-label').text(price_result);
//                Altdaki hidden inputa deyer artirir ki formla onu gondere bilek
                $('#hiddenPrice').val(price);



                var room_status=$('input[name="stat-square-radio"]:checked').val();
                var people_number=$('input[name="square-radio"]:checked').val();
                $('#peoplenumb').val(people_number);
                $.ajax({
                    type: "POST",
                    url:"/hotel/rooms",
                    data: {room_status:room_status,people_number:people_number,_token:"{{csrf_token()}}"} ,
                    success: function(data) {


                        $("#example-room-input").html('');
                        $("#example-room-input").html(data);
                        $(".selectpicker").selectpicker('refresh')
                    }
                });


            })

        })


    </script>

@endsection
