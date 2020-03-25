<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Data
 * @package App\Models
 * @version March 24, 2020, 11:45 pm UTC
 *
 * @property string name
 * @property string mobile
 * @property string service_type
 * @property string living_area
 * @property string|\Carbon\Carbon date_time
 */
class Data extends Model
{
    use SoftDeletes;

    public $table = 'data';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'mobile',
        'service_type',
        'living_area',
        'date_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'mobile' => 'string',
        'service_type' => 'string',
        'living_area' => 'string',
        'date_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mobile' => 'required',
        'service_type' => 'required'
    ];

    
}
