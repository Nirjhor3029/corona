<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version March 25, 2020, 1:35 am UTC
 *
 * @property \App\Models\ServiceType serviceType
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection areaSuppliers
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property string name
 * @property integer priority
 * @property integer capacity
 * @property integer user_id
 * @property integer service_type_id
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'suppliers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'priority',
        'capacity',
        'user_id',
        'service_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'priority' => 'integer',
        'capacity' => 'integer',
        'user_id' => 'integer',
        'service_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'priority' => 'required',
        'capacity' => 'required',
        'user_id' => 'required',
        'service_type_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceType()
    {
        return $this->belongsTo(\App\Models\ServiceType::class, 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function areaSuppliers()
    {
        return $this->hasMany(\App\Models\AreaSupplier::class, 'supplier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'supllier_id');
    }
}
