<div class="row el-element-overlay">

    @foreach($sort_employees as $employee)
        <div class="col-lg-2 col-md-3">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> <img src="/assets/images/personals/{{$employee->photo_name}}.jpg" alt="{{$employee->first_name}} {{$employee->last_name}}" />

                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">{{$employee->first_name}} {{$employee->last_name}}</h3> <small><b style="color: #00b286">{{$employee->work_name}}</b></small>
                        <br/> </div>
                </div>
            </div>

        </div>
    @endforeach

</div>