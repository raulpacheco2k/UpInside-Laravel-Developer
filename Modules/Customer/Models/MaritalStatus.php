<?php


namespace Modules\Customer\Models;


class MaritalStatus
{
    public const NOT_MARRIED = 1;
    public const MARRIED = 2;
    public const SEPARATE = 3;
    public const DIVORCED = 4;
    public const WIDOWER = 5;

    public const TYPES = self::NOT_MARRIED . "," . self::MARRIED . "," . self::SEPARATE . "," . self::DIVORCED . "," . self::WIDOWER;

    public static function labels(): array
    {
        return array(
            'Spouse Not Required' => array(
                self::NOT_MARRIED => 'Not married',
                self::SEPARATE => 'Separate',
                self::DIVORCED => 'Divorced',
                self::WIDOWER => 'Widower'
            ),
            'Required Spouse' => array(
                self::MARRIED => 'Married',

            )
        );
    }

    /**
     * @return array
     */
    final public static function toArray(): array
    {
        return self::labels();
    }
}