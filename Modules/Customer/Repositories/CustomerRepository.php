<?php

namespace Modules\Customer\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Customer\Models\Customer;

/**
 * Class CustomerRepository.
 *
 * @package namespace App\Repositories;
 */
class CustomerRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    final public function model()
    {
        return Customer::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    final public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
