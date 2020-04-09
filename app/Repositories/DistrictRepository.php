<?php

namespace App\Repositories;

use App\Models\District;
use App\Repositories\BaseRepository;

/**
 * Class DistrictRepository
 * @package App\Repositories
 * @version April 9, 2020, 3:57 am UTC
*/

class DistrictRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'division_id',
        'name',
        'bn_name',
        'lat',
        'lon',
        'url'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return District::class;
    }
}
