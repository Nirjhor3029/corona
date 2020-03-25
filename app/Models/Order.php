<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version March 25, 2020, 3:22 am UTC
 *
 * @property \App\Models\Orderstatus orderstatus
 * @property \App\Models\ServiceType serviceType
 * @property \App\Models\Supplier supllier
 * @property string name
 * @property string mobile
 * @property integer service_type_id
 * @property integer supllier_id
 * @property integer orderstatus_id
 * @property string remarks
 * @property number amount
 * @property string|\Carbon\Carbon date_time
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'mobile',
        'service_type_id',
        'supllier_id',
        'orderstatus_id',
        'remarks',
        'amount',
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
        'service_type_id' => 'integer',
        'supllier_id' => 'integer',
        'orderstatus_id' => 'integer',
        'remarks' => 'string',
        'amount' => 'float',
        'date_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mobile' => 'required',
        'service_type_id' => 'required',
        'supllier_id' => 'required',
        'orderstatus_id' => 'required',
        'amount' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orderstatus()
    {
        return $this->belongsTo(\App\Models\Orderstatus::class, 'orderstatus_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceType()
    {
        return $this->belongsTo(\App\Models\Service_type::class, 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function supllier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'supllier_id');
    }
}
