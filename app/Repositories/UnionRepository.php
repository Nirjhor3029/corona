<?php

namespace App\Repositories;

use App\Models\Union;
use App\Repositories\BaseRepository;

/**
 * Class UnionRepository
 * @package App\Repositories
 * @version April 9, 2020, 3:58 am UTC
*/

class UnionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'upazilla_id',
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
        return Union::class;
    }
}
