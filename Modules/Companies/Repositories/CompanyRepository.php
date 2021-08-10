<?php

namespace Modules\Companies\Repositories;

use Modules\Companies\Models\Company;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CompanyRepository.
 *
 * @package namespace App\Repositories;
 */
class CompanyRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    final public function model(): string
    {
        return Company::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
