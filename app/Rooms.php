<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model

{

    protected $table='rooms';
    protected $fillable=['id','floor','room_name','servcie_status','people_number','admin_id','birthday'];
    protected $guarded=array();

}
