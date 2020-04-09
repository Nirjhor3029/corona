<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Upazilla
 * @package App\Models
 * @version April 9, 2020, 3:58 am UTC
 *
 * @property \App\Models\District district
 * @property \Illuminate\Database\Eloquent\Collection unions
 * @property integer district_id
 * @property string name
 * @property string bn_name
 * @property string url
 */
class Upazilla extends Model
{
    use SoftDeletes;

    public $table = 'upazilas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'district_id',
        'name',
        'bn_name',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'district_id' => 'integer',
        'name' => 'string',
        'bn_name' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'district_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function unions()
    {
        return $this->hasMany(\App\Models\Union::class, 'upazilla_id');
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'upazilla_id');
    }
}
