<?php

namespace App\Repositories;

use App\Models\Area;
use App\Repositories\BaseRepository;

/**
 * Class AreaRepository
 * @package App\Repositories
 * @version March 24, 2020, 2:29 pm UTC
*/

class AreaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'district_name'
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
        return Area::class;
    }
}
