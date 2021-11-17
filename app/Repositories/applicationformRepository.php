<?php

namespace App\Repositories;

use App\Models\applicationform;
use App\Repositories\BaseRepository;

/**
 * Class applicationformRepository
 * @package App\Repositories
 * @version October 26, 2021, 6:49 pm UTC
*/

class applicationformRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'age',
        'department',
        'phone',
        'email'
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
        return applicationform::class;
    }
}
