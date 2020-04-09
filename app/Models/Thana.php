<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Thana
 * @package App\Models
 * @version April 8, 2020, 3:39 pm UTC
 *
 * @property \App\Models\District district
 * @property \Illuminate\Database\Eloquent\Collection unions
 * @property string name
 * @property integer district_id
 */
class Thana extends Model
{
    use SoftDeletes;

    public $table = 'thanas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'district_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'district_id' => 'integer'
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
        return $this->hasMany(\App\Models\Union::class, 'thana_id');
    }
}
