<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class District
 * @package App\Models
 * @version April 9, 2020, 3:57 am UTC
 *
 * @property \App\Models\Division division
 * @property \Illuminate\Database\Eloquent\Collection thanas
 * @property \Illuminate\Database\Eloquent\Collection upazilas
 * @property integer division_id
 * @property string name
 * @property string bn_name
 * @property string lat
 * @property string lon
 * @property string url
 */
class District extends Model
{
    use SoftDeletes;

    public $table = 'districts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'division_id',
        'name',
        'bn_name',
        'lat',
        'lon',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'division_id' => 'integer',
        'name' => 'string',
        'bn_name' => 'string',
        'lat' => 'string',
        'lon' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'division_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function division()
    {
        return $this->belongsTo(\App\Models\Division::class, 'division_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function thanas()
    {
        return $this->hasMany(\App\Models\Thana::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function upazilas()
    {
        return $this->hasMany(\App\Models\Upazila::class, 'district_id');
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'district_id');
    }
}
