<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Repositories\BaseRepository;

/**
 * Class SupplierRepository
 * @package App\Repositories
 * @version March 24, 2020, 3:11 pm UTC
*/

class SupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'priority',
        'capacity',
        'user_id'
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
        return Supplier::class;
    }
}
