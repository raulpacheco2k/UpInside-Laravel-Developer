<?php


namespace App\Models;


class MarriagePropertyRegimes
{
    public const PARTIAL_COMMUNION = 1;
    public const UNIVERSAL_COMMUNION = 2;
    public const FINAL_PARTIAL_OF_ACQUISITION = 3;
    public const CONVENTIONAL_SEPARATION_OF_PROPERTIES = 4;

    public const TYPES = self::PARTIAL_COMMUNION . "," . self::UNIVERSAL_COMMUNION . "," . self::FINAL_PARTIAL_OF_ACQUISITION . "," . self::CONVENTIONAL_SEPARATION_OF_PROPERTIES;

    public static function labels(): array
    {
        return array(
            self::PARTIAL_COMMUNION => 'Partial Communion',
            self::UNIVERSAL_COMMUNION => 'Universal Communion',
            self::FINAL_PARTIAL_OF_ACQUISITION => 'Final Partition of Acquisitions',
            self::CONVENTIONAL_SEPARATION_OF_PROPERTIES => 'Conventional Separation of Property'
        );
    }

    final public static function getLabel(int $value): string
    {
        return array_search($value, self::labels(), true);
    }

    final public static function toArray(): array
    {
        return self::labels();
    }
}