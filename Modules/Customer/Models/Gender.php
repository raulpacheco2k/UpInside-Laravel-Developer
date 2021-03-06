<?php


namespace Modules\Customer\Models;


class Gender
{
    public const MALE = 1;
    public const FEMALE = 2;
    public const OTHERS = 3;

    public const TYPES = self::MALE . "," . self::FEMALE . "," . self::OTHERS;

    public static function labels(): array
    {
        return array(
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::OTHERS => 'Others'
        );
    }

    final public static function getLabel(int $value): string
    {
        return self::labels()[$value];
    }

    final public static function toArray(): array
    {
        return self::labels();
    }
}
