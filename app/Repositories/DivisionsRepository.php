<?php

namespace App\Repositories;

use App\Models\Divisions;
use App\Repositories\BaseRepository;

/**
 * Class DivisionsRepository
 * @package App\Repositories
 * @version April 9, 2020, 3:50 am UTC
*/

class DivisionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'bn_name',
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
        return Divisions::class;
    }
}
