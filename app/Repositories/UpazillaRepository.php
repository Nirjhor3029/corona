<?php

namespace App\Repositories;

use App\Models\Upazilla;
use App\Repositories\BaseRepository;

/**
 * Class UpazillaRepository
 * @package App\Repositories
 * @version April 9, 2020, 3:58 am UTC
*/

class UpazillaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'district_id',
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
        return Upazilla::class;
    }
}
