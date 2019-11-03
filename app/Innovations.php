<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Innovations extends Model
{
    protected $table='innovations';
    protected $fillable=['header_title_az','header_title_en','text_az','text_en','photo_slug','ribbon_type_name','ribbon_icon_name'];
    protected $guarded=array();
}
