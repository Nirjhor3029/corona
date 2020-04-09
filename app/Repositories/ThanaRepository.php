<?php

namespace App\Repositories;

use App\Models\Thana;
use App\Repositories\BaseRepository;

/**
 * Class ThanaRepository
 * @package App\Repositories
 * @version April 8, 2020, 3:39 pm UTC
*/

class ThanaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'district_id'
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
        return Thana::class;
    }
}
