<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'zipcode',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement'
    ];

    public static array $filters = [
        'zipcode' => 'digit',
        'state' => 'capitalize',
        'city' => 'capitalize',
        'neighborhood' => 'capitalize',
        'street' => 'capitalize',
        'number' => ' digit'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\AddressFactory::new();
    }
}
