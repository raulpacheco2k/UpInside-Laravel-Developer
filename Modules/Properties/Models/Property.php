<?php

namespace Modules\Properties\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Address\Models\Address;

class Property extends Model
{
    use HasFactory;

    /**
     * @var array|string[]
     */
    protected $fillable = [
        'sale',
        'rent',
        'type',
        'customer',
        'sale_price',
        'rent_price',
        'iptu',
        'condominium',
        'description',
        'bedrooms',
        'suites',
        'bathrooms',
        'rooms',
        'garage',
        'garage_covered',
        'area_total',
        'area_util',
        'air_conditioning',
        'bar',
        'library',
        'barbecue_grill',
        'american_kitchen',
        'fitted_kitchen',
        'pantry',
        'edicule',
        'office',
        'bathtub',
        'fireplace',
        'lavatory',
        'furnished',
        'pool',
        'steam_room',
        'view_of_the_sea',
        'files',
        'address_id',
        'locator_id'
    ];
    
    public array $rules = [
        'user' => 'required',
        'category' => 'required',
        'type' => 'required',
        'sale_price' => 'required_if:sale,on',
        'rent_price' => 'required_if:rent,on',
        'tribute' => 'required',
        'condominium' => 'required',
        'description' => 'required',
        'bedrooms' => 'required',
        'suites' => 'required',
        'bathrooms' => 'required',
        'rooms' => 'required',
        'garage' => 'required',
        'garage_covered' => 'required',
        'area_total' => 'required',
        'area_util' => 'required',
    ];

    public static array $filters = [
        'sale_price' => 'digit',
        'rent_price' => 'digit',
        'iptu' => 'digit',
        'condominium' => 'digit',
    ];

    final public function address(): hasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
