<?php

namespace App\Repositories;

use App\Models\Data;
use App\Repositories\BaseRepository;

/**
 * Class DataRepository
 * @package App\Repositories
 * @version March 24, 2020, 11:45 pm UTC
*/

class DataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'mobile',
        'service_type',
        'living_area',
        'date_time'
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
        return Data::class;
    }
}
