<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services_Log extends Model
{
    protected $table='services_log';
    protected $fillable=['services_status','check_in','check_out','messages','people_number_human','user_id'];
    protected $guarded=array();




}
