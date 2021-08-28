<?php

namespace Modules\Properties\Models;

class PropertyTypes
{
    public const APARTMENT = 1;
    public const LOFT = 2;
    public const PENTHOUSE = 3;
    public const HOUSE = 4;
    public const CONDOMINIUM_HOUSE = 5;
    public const KITCHENETTE = 6;
    public const TOWNHOUSE = 7;
    public const RESIDENTIAL_BUILDING = 8;

    public const CLINIC = 9;
    public const OFFICE = 10;
    public const WAREHOUSE = 11;
    public const COMMERCIAL_PROPERTY = 12;
    public const STORE = 13;
    public const COMMERCIAL_BUILDING = 14;

    public const FARM = 15;
    public const RANCH = 16;

    public const LAND = 17;


    public static function labels(): array
    {
        return array(
            'Residential' => [
                self::APARTMENT => 'Apartment',
                self::PENTHOUSE => 'Penthouse',
                self::LOFT => 'Loft',
                self::KITCHENETTE => 'Kitchenette',
                self::HOUSE => 'House',
                self::CONDOMINIUM_HOUSE => 'Condominium house',
                self::TOWNHOUSE => 'Townhouse',
                self::RESIDENTIAL_BUILDING => 'Residential Building',
            ],
            'Commercial' => [
                self::CLINIC => 'Clinic',
                self::OFFICE => 'Office',
                self::WAREHOUSE => 'Warehouse',
                self::COMMERCIAL_PROPERTY => 'Commercial Property',
                self::STORE => 'Store',
                self::COMMERCIAL_BUILDING => 'Commercial Building'
            ],
            'Rural Property' => [
                self::FARM => 'Farm',
                self::RANCH => 'Ranch',
            ],
            'Others' => [
                self::LAND => 'Land'
            ]
        );
    }

    final public static function getLabel(int $value): string
    {
        foreach (self::labels() as $label) {
            if (array_key_exists($value, $label)) {
                return $label[$value];
            }
        }

        return 'Not found';
    }

    final public static function toArray(): array
    {
        return self::labels();
    }
}