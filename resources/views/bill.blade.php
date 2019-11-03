
@extends('app')

@section('content')
    <div class="general">


        <h1 style="text-align: center;margin-top: 1vw;">{{trans('bill-page.payment')}}</h1>



        @php
            $user_status=Auth::user()->status;
        @endphp

        @if($user_status=='1' && $user_status=='2')
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>{{trans('bill-page.client')}}</th>

                                    <th>{{trans('bill-page.room')}}</th>
                                    <th>{{trans('bill-page.price')}}</th>
                                    <th>{{trans('bill-page.payment')}}</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>{{trans('bill-page.client')}}</th>

                                    <th>{{trans('bill-page.room')}}</th>
                                    <th>{{trans('bill-page.price')}}</th>
                                    <th>{{trans('bill-page.payment')}}</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($clients as $client)
                                    @if($client->status==0)
                                        <tr>

                                            <td>{{$client->first_name.' '.$client->last_name.' '.$client->father_name}}</td>
                                            <td>{{$client->roomFunc->room_name}}</td>
                                            <td>{{$client->payment}}</td>
                                            <td ><button  onclick="sil (this,'{{$client->id}}')" class="btn  mybutton" > <span>{{trans('bill-page.to_pay')}}</span> <i class="mdi mdi-square-inc-cash"></i> </button></td>

                                        </tr>
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>
        @endif



        @php

            $mydata=\App\Card::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get();
            $say=$mydata->count();
            $user=\Illuminate\Support\Facades\Auth::user();
        @endphp

            @if($user_status=='9' && $say<1)
                <div class="row register-row">
                <div class="col-sm-12">


                    <div class="card-body">


                            <form action="" method="post"  class="form col-sm-12">
                                <h1 style="text-align: center">{{trans('bill-page.add_credit_card')}}</h1>
                                {{csrf_field()}}
                                <div  class="col-sm-4">


                                    {{--Card number--}}
                                    <div class="form-group">
                                        <label for="fullcode" class="col-3 col-form-label">{{trans('bill-page.card_number')}}</label>
                                        <div class="col-sm-12">

                                            <input  name="card_number" class="form-control" type="text" placeholder="0000 0000 0000 0000" id="fullcode" autofocus>

                                        </div>
                                    </div>
                                    {{--Card Holder--}}
                                    <div     class="form-group">
                                        <label for="card_holder" class="col-6">{{trans('bill-page.card_holder')}}</label>
                                        <label for="expires_month" class="col-5" style="float:right; padding-left: 1.5vw">{{trans('bill-page.expires')}}</label>
                                        <div  class="col-12">
                                            <input name="card_holder" class="form-control col-7"  type="text" placeholder="Willian Kimmich" id="card_holder">

                                            <input name="expires_month" class="form-control  col-2"  style="margin-left: 1vw"  type="text" placeholder="00" id="expires_month">
                                            <input name="expires_year" class="form-control  col-2"  type="text" placeholder="00" id="expires_year">

                                        </div>

                                    </div>



                                    {{--cvv--}}
                                    <div class="form-group">
                                        <label for="cvv" class="col-3 col-form-label">{{trans('bill-page.cvv')}}</label>
                                        <div class="col-9">
                                            <input name="cvv" class="form-control col-3" type="text" placeholder="000" id="cvv">
                                        </div>
                                    </div>

                                </div>
                                <div  class="col-sm-4 register-image">

                                    <button id="submit-register" class=" btn btn-success btn-lg btn-block   waves-effect waves-light" type="submit">{{trans('bill-page.add')}}</button>


                                </div>


                            </form>


                    </div>

                </div>

            </div>
            @endif




            @if($user_status=='9' && $say>0)
            @if($user->clientFunc->status==0)
                <div class="table-responsive m-t-40">

                <table id="example24" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>{{trans('bill-page.client')}}</th>
                        <th>{{trans('bill-page.room')}}</th>
                        <th>{{trans('bill-page.price')}}</th>
                        <th>{{trans('bill-page.payment')}}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{trans('bill-page.client')}}</th>

                        <th>{{trans('bill-page.room')}}</th>
                        <th>{{trans('bill-page.price')}}</th>
                        <th>{{trans('bill-page.payment')}}</th>
                    </tr>
                    </tfoot>
                    <tbody>



                            <tr>

                                <td>{{$user->clientFunc->first_name.' '.$user->clientFunc->last_name.' '.$user->clientFunc->father_name}}</td>
                                <td>{{$user->clientFunc->roomFunc->room_name}}</td>
                                <td>{{$user->clientFunc->payment}}</td>
                                <td ><button  onclick="pay (this,'{{$user->clientFunc->id}}')" class="btn  mybutton" > <span>{{trans('bill-page.to_pay_card')}}</span> <i class="mdi mdi-square-inc-cash"></i> </button></td>
                            </tr>

                    </tbody>
                </table>
                    @if($user->clientFunc->status==0)
                <div  class="col-sm-2 register-image">

                    <button  class=" btn btn-danger btn-lg btn-block   waves-effect waves-light" onclick="deleteCard('{{$user->clientFunc->id}}')" >{{trans('bill-page.delete_card')}}</button>


                </div>
                        @endif
            </div>
            @endif
            @endif


    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/assets/node_modules/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/css/payment.css">
@endsection


@section('js')

    <script src="../assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="/js/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="/js//buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="/js/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="/js/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="/js/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="/js/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="/js/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#example23').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example23 tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ]
        });
    </script>


    <script>


        $(document).ready(function () {

            var dil= document.getElementById("ForLanguage").title;
            var ifade = ''
            if(dil=='az'){
                ifade = '<i class="mdi mdi-file-excel"></i> Excel faylı olaraq yüklə'
            }
            else if (dil=='en'){
                ifade = '<i class="mdi mdi-file-excel"></i> Download like Excel file'
            }

            $(".buttons-excel").html(ifade);

        })
    </script>




    <!-- Sweet-Alert  -->
    <script src="/assets/node_modules/sweetalert2/jquery.form.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/jquery.validate.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/messages_az.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/sweetalert2.min.js" ></script>
    <!-- Sweet-Alert  -->
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

                            window.location.href="/Ödəniş";

                        }
                    });




                }


            });

        });
    </script>





    <script>
        function  sil(r,id) {





            var sira=r.parentNode.parentNode.rowIndex;

            var dil= document.getElementById("ForLanguage").title;
            var text,title,cancelButton,confirmButton;

            if(dil=='az') {

                text="Əgər bu prosesi icra etsəniz çıxış əməliyyatı baş verəcək!";
                title="Ödəniş etməyə əminsən?!";
                cancelButton="Ləğv";
                confirmButton="Seç";
            }
            else if (dil=='en'){

                text="If will do it this process then will be exit operation";
                title="Are you sure for to Pay";
                cancelButton="Cancel";
                confirmButton="Ok";
            }
            swal({
                title:title,
                text:text,
                type:'warning',
                showCancelButton:true,
                cancelButtonText:cancelButton,
                confirmButtonColor:'#00C292',
                cancelButtonColor:'#d33',
                confirmButtonText:confirmButton


            }).then(function () {

                var CSRF_TOKEN=$('meta[name="csrf-token"]').attr('content');
                $.ajax(
                    {
                        type: "Post",
                        url:'',
                        data:{

                            'id':id,
                            '_token':CSRF_TOKEN
                        },

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

                                document.getElementById("example23").deleteRow(sira);
                            }
                        }
                    }

                )
            })
        }
        function  pay(r,id) {





            var sira=r.parentNode.parentNode.rowIndex;
            var operation="pay"
            var dil= document.getElementById("ForLanguage").title;
            var text,title,cancelButton,confirmButton;

            if(dil=='az') {

                text="Əgər bu prosesi icra etsəniz çıxış əməliyyatı baş verəcək!";
                title="Ödəniş etməyə əminsən?!";
                cancelButton="Ləğv";
                confirmButton="Seç";
            }
            else if (dil=='en'){

                text="If will do it this process then will be exit operation";
                title="Are you sure for to Pay";
                cancelButton="Cancel";
                confirmButton="Ok";
            }
            swal({
                title:title,
                text:text,
                type:'warning',
                showCancelButton:true,
                cancelButtonText:cancelButton,
                confirmButtonColor:'#00C292',
                cancelButtonColor:'#d33',
                confirmButtonText:confirmButton


            }).then(function () {

                var CSRF_TOKEN=$('meta[name="csrf-token"]').attr('content');
                $.ajax(
                    {
                        type: "Post",
                        url:'/'+dil+'/Deletecard-Paycard',
                        data:{

                            'id':id,
                            'operation':operation,

                            '_token':CSRF_TOKEN
                        },

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

                                    window.location.href="/Çek";

                                }
                            });
                        }
                    }

                )
            })
        }
        function  deleteCard(id) {






            var operation="delete"
            var dil= document.getElementById("ForLanguage").title;
            var text,title,cancelButton,confirmButton;

            if(dil=='az') {

                text="Əgər bu prosesi icra etsəniz çıxış əməliyyatı baş verəcək!";
                title="Kartı silməyə əminsən?!";
                cancelButton="Ləğv";
                confirmButton="Seç";
            }
            else if (dil=='en'){

                text="If will do it this process then will be exit operation";
                title="Are you sure  to Delete Card";
                cancelButton="Cancel";
                confirmButton="Ok";
            }
            swal({
                title:title,
                text:text,
                type:'warning',
                showCancelButton:true,
                cancelButtonText:cancelButton,
                confirmButtonColor:'#00C292',
                cancelButtonColor:'#d33',
                confirmButtonText:confirmButton


            }).then(function () {

                var CSRF_TOKEN=$('meta[name="csrf-token"]').attr('content');
                $.ajax(
                    {
                        type: "Post",
                        url:'/'+dil+'/Deletecard-Paycard',
                        data:{

                            'id':id,
                            'operation':operation,
                            '_token':CSRF_TOKEN
                        },

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

                                    window.location.href="/Ödəniş";

                                }
                            });

                        }
                    }

                )
            })
        }
    </script>

@endsection