<?php

namespace Modules\Companies\Repositories;

use Modules\Companies\Models\Companies;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CompaniesRepository.
 *
 * @package namespace App\Repositories;
 */
class CompaniesRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    final public function model(): string
    {
        return Companies::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
