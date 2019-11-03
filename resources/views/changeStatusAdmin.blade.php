
@extends('app')

@section('content')
    <div class="general">


        <h1 style="text-align: center;margin-top: 1vw;">{{trans('changestatus-page.changeStatus')}}</h1>



        <div class="form-group row">

            <div class="col-9">
                <label for="status">{{trans('changestatus-page.selectstatus')}}</label>
                <select  name="status" class="selectpicker" data-style="btn-success">

                    <option value="0">{{trans('changestatus-page.user')}}</option>

                    <option value="1">{{trans('changestatus-page.admin')}}</option>
                    <option value="2">{{trans('changestatus-page.editor')}}</option>
                    <option value="8">{{trans('changestatus-page.client_unconfirmed')}}</option>
                    <option value="9">{{trans('changestatus-page.client_confirmed')}}</option>


                </select>
            </div>
        </div>
        <div class="table-responsive m-t-40">
            <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>{{trans('changestatus-page.name')}}</th>
                    <th>{{trans('changestatus-page.fullname')}}</th>
                    <th>{{trans('changestatus-page.workname')}}</th>
                    <th>{{trans('changestatus-page.operation')}}</th>
                    <th>{{trans('changestatus-page.operation')}}</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>{{trans('changestatus-page.name')}}</th>
                    <th>{{trans('changestatus-page.fullname')}}</th>
                    <th>{{trans('changestatus-page.workname')}}</th>
                    <th>{{trans('changestatus-page.operation')}}</th>
                    <th>{{trans('changestatus-page.operation')}}</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($users as $user)

                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->first_name.' '.$user->last_name}}</td>

                            @php
                            $status=$user->status;

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
                             else if ($status=='8'){
                            $work_name='Təsdiqlənməmiş Müştəri';
                            }
                            else if ($status=='9'){
                            $work_name='Təsdiqlənmiş Müştəri';
                            }
                        }
                            @endphp
                            <td>{{$work_name}}</td>
                            <td ><button  onclick="changeStatus (this,'{{$user->id}}')" class="btn  mybutton" > <span>{{trans('changestatus-page.change')}}</span> <i class="mdi mdi-square-inc-cash"></i> </button></td>
                            <td ><button style="background: red" onclick="sil (this,'{{$user->id}}')" class="btn  mybutton" > <span>{{trans('changestatus-page.delete')}}</span> <i class="mdi mdi-delete"></i> </button></td>

                        </tr>

                @endforeach

                </tbody>
            </table>
        </div>




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




    {{--<!-- Sweet-Alert  -->--}}
    <script src="/assets/node_modules/sweetalert2/jquery.form.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/jquery.validate.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/messages_az.min.js" ></script>
    <script src="/assets/node_modules/sweetalert2/sweetalert2.min.js" ></script>
    {{--<!-- Sweet-Alert  -->--}}


    <script>


        function  changeStatus(r,id) {





            var status=$(".selectpicker").val();

//            var sira=r.parentNode.parentNode.rowIndex;
            var operation="change"
            var dil= document.getElementById("ForLanguage").title;
            var text,title,cancelButton,confirmButton;

            if(dil=='az') {

                text="Əgər bu prosesi icra etsəniz çıxış əməliyyatı baş verəcək!";
                title="Vəzifədə dəyişiklik  etməyə əminsən?!";
                cancelButton="Ləğv";
                confirmButton="Seç";
            }
            else if (dil=='en'){

                text="If will do it this process then will be exit operation";
                title="Are you sure  to Change Work Positon";
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
                            'status':status,
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

                                    window.location.href="/Vəzifə-Dəyiş";

                                }
                            });

                        }
                    }

                )
            })
        }
        function  sil(r,id) {





            var sira=r.parentNode.parentNode.rowIndex;

            var operation="delete"
            var dil= document.getElementById("ForLanguage").title;
            var text,title,cancelButton,confirmButton;

            if(dil=='az') {

                text="Əgər bu prosesi icra etsəniz çıxış əməliyyatı baş verəcək!";
                title="Hesabı silməyə etməyə əminsən?!";
                cancelButton="Ləğv";
                confirmButton="Seç";
            }
            else if (dil=='en'){

                text="If will do it this process then will be exit operation";
                title="Are you sure  to Delete account?!";
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
                                    document.getElementById("example23").deleteRow(sira);


                                }
                            });

                        }
                    }

                )
            })
        }
    </script>



@endsection