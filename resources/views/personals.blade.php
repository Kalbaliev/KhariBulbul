
@extends('app')

@section('content')

    <div class="general">

        <h1 style="text-align: center;margin-top: 1vw;">{{trans('employees-page.personals')}}</h1>
        <div class="el-element-ove">
            <div class="col-lg-2 col-md-3 boxForSelect">

            </div>
        </div>

        <select id="floor_select" name="floor" class="selectpicker" data-style="btn-success">
            <option value="0">{{trans('employees-page.choose_the_floor')}}</option>
            <option value="1">{{trans('employees-page.first')}} {{trans('employees-page.floor')}}</option>
            <option value="2">{{trans('employees-page.second')}} {{trans('employees-page.floor')}}</option>
            <option value="3">{{trans('employees-page.third')}} {{trans('employees-page.floor')}}</option>
            <option value="4">{{trans('employees-page.fourth')}} {{trans('employees-page.floor')}}</option>
            <option value="5">{{trans('employees-page.fifth')}} {{trans('employees-page.floor')}}</option>
            <option value="6">{{trans('employees-page.sixth')}} {{trans('employees-page.floor')}}</option>
            <option value="7">{{trans('employees-page.seventh')}} {{trans('employees-page.floor')}}</option>


        </select>

        <div id="personals">
            <div class="row el-element-overlay">

                @foreach($personals as $personal)
                    <div class="col-lg-2 col-md-3">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="/assets/images/personals/{{$personal->photo_name}}.jpg" alt="{{$personal->first_name}} {{$personal->last_name}}" />

                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title">{{$personal->first_name}} {{$personal->last_name}}</h3> <small><b style="color: #00b286">{{$personal->work_name}}</b></small>
                                    <br/> </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('css')

    <link href="/css/pages/user-card.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/personal.css">
@endsection


@section('js')


    <script>

        $(document).ready(function () {


            $("#floor_select").change(function(){


                var floor=$('#floor_select option:selected').val();


                $.ajax({
                    type: "POST",
                    url: "/hotel/personals",
                    data: {floor:floor,_token:"{{csrf_token()}}"} ,
                    success: function(data) {



                        $("#personals").html('');
                        $("#personals").html(data);

                    }
                });


            })

        })


    </script>
@endsection