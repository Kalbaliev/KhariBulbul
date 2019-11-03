
@extends('app')

@section('content')
    <div class="general">


        <h1 style="text-align: center;margin-top: 1vw;">Çek</h1>






            <div id="table" style="display: block;margin: auto" class="table-responsive m-t-40 col-md-6">

                    <table id="example23" class="display  table table-hover table-striped table-bordered" style="background: yellow;color:black" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>

                        </tr>
                        </tfoot>
                    <tbody>

                            <tr>
                                <td colspan="2">    <img style="display: block; margin: auto;height: 150px;width: 150px;"  src="../assets/images/logo30.png" alt="logo"  /> <h2 align="center">Khari Bulbul </h2> </td>

                            </tr>
                            <tr>
                                <td>Müştəri</td>
                                <td>{{$client->first_name.' '.$client->last_name.' '.$client->father_name }}</td>
                            </tr>
                            <tr>
                                <td>Cinsi</td>
                                @php
                                if($client->gender=='1'){
                                    $client->gender="Qadın";
                                }
                                else{
                                      $client->gender="Kişi";
                                }

                                if($client->services=='0'){

                                $client->services="General";
                                }
                                elseif($client->services=='0'){
                                $client->services="Premium";
                                }
                                else{
                                 $client->services="Business";
                                }
                                        @endphp
                                <td>{{$client->gender }}</td>
                            </tr>
                            <tr>
                                <td>FİN</td>

                                <td>{{$client->FIN }}</td>
                            </tr>
                            <tr>
                                <td>Doğum yeri</td>
                                <td>{{$client->birth_place }}</td>
                            </tr>
                            <tr>
                                <td>Doğum günü</td>
                                <td>{{$client->birthday }}</td>
                            </tr>
                            <tr>
                                <td>Telefon</td>
                                <td>{{$client->phone }}</td>
                            </tr>
                            <tr>
                                <td>Otaq</td>
                                <td>{{$client->roomFunc->room_name }}</td>
                            </tr>
                            <tr>
                                <td>Ümumi Müştərilər</td>
                                <td>{{$client->peoples }}</td>
                            </tr>

                            <tr>
                                <td>Nəfər sayı</td>
                                <td>{{$client->people_number_human }}</td>
                            </tr>
                            <tr>
                                <td>Xidmət</td>
                                <td>{{$client->services }}</td>
                            </tr>
                            <tr>
                                <td>Giriş Tarixi</td>
                                <td>{{$client->check_in }}</td>
                            </tr>
                            <tr>
                                <td>Çıxış Tarixi</td>
                                <td>{{$client->check_out }}</td>
                            </tr>
                            <tr >
                                <td colspan="2" align="right">Ödəniş  {{$client->payment }} <br><br>
                                    İmza : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>


                            </tr>

                    </tbody>
                </table>

            </div>

        <div style="display: block;margin: auto" class="col-sm-3 register-image">

            <button  class=" btn btn-danger btn-lg btn-block   waves-effect waves-light" onclick="printTable('table')" >Çeki çapa ver</button>


        </div>




    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/payment.css">
    <link rel="stylesheet" href="/css/clients.css">
    <link rel="stylesheet" href="/assets/node_modules/sweetalert2/sweetalert2.min.css">

    <style>

        .table-striped tbody tr {
            color:black;
            background:   white;
        }
    </style>
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

    <script>

        function printTable(el) {
            var restorepage=document.body.innerHTML;
            var printcontent=document.getElementById(el).innerHTML;
            document.body.innerHTML=printcontent;
            window.print();
            document.body.innerHTML=restorepage;
            
        }
    </script>



@endsection