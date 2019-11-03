<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personals';
    protected $fillable=['first_name','last_name','work_name','photo_name','floor','p_or_e'];
    protected $guarded=array();
}
