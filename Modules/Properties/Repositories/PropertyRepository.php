<?php

namespace Modules\Properties\Repositories;

use Modules\Properties\Models\Property;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class PropertyRepository extends BaseRepository
{

    final public function model(): string
    {
        return Property::class;
    }

    final public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
