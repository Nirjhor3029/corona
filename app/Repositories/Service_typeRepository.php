<?php

namespace App\Repositories;

use App\Models\Service_type;
use App\Repositories\BaseRepository;

/**
 * Class Service_typeRepository
 * @package App\Repositories
 * @version March 24, 2020, 3:13 pm UTC
*/

class Service_typeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_name'
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
        return Service_type::class;
    }
}
