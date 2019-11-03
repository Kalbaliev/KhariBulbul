<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table='card_info';
    protected $fillable=['card_number','card_holder','expires_month','expires_year','cvv','user_id'];
    protected $guarded=array();


}
