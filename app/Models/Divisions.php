<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Divisions
 * @package App\Models
 * @version April 9, 2020, 3:50 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection districts
 * @property string name
 * @property string bn_name
 * @property string url
 */
class Divisions extends Model
{
    use SoftDeletes;

    public $table = 'divisions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function districts()
    {
        return $this->hasMany(\App\Models\District::class, 'division_id');
    }
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'division_id');
    }
}
