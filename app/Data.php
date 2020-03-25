<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'name', 'mobile', 'service_type','living_area','date_time'
    ];
    //
}
