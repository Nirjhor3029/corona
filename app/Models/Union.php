<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Union
 * @package App\Models
 * @version April 9, 2020, 3:58 am UTC
 *
 * @property \App\Models\Upazila upazilla
 * @property integer upazilla_id
 * @property string name
 * @property string bn_name
 * @property string url
 */
class Union extends Model
{
    use SoftDeletes;

    public $table = 'unions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'upazilla_id',
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
        'upazilla_id' => 'integer',
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
        'upazilla_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function upazilla()
    {
        return $this->belongsTo(\App\Models\Upazila::class, 'upazilla_id');
    }
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'union_id');
    }
}
