<?php

namespace Modules\Address\Repositories;

use Elegant\Sanitizer\Sanitizer;
use Modules\Address\Models\Address;
use Prettus\Repository\Eloquent\BaseRepository;

class AddressRepository extends BaseRepository
{
    final public function model(): string
    {
        return Address::class;
    }

    final public function create(array $attributes)
    {
        $attributes = new Sanitizer($attributes, Address::$filters);

        return parent::create($attributes->sanitize());
    }

    final public function update(array $attributes, $id)
    {
        $attributes = new Sanitizer($attributes, Address::$filters);

        return parent::update($attributes->sanitize(), $id);
    }
}