<?php

namespace App\Repositories;

use App\Models\Orderstatus;
use App\Repositories\BaseRepository;

/**
 * Class OrderstatusRepository
 * @package App\Repositories
 * @version March 24, 2020, 3:17 pm UTC
*/

class OrderstatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_name'
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
        return Orderstatus::class;
    }
}
