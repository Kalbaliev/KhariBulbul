<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table='clients';
    protected $fillable=['first_name','last_name','father_name','gender','FIN','birth_place','birthday','phone','room_no','peoples','people_number_human','services','check_in','check_out','payment','status','user_id','worker_id'];
    protected $guarded=array();



//    Izahat verimki  bu table olan sonda yazilmis room_no ile gedib Room modelinde id sutunu ile qowulma baw verir ve
//roomFunc->istenilen sutunu yazilib data elde edilir
    public function roomFunc(){


        return $this->hasOne('App\Rooms','id','room_no'); //id-lesmedi
    }
}
