<?php

namespace App\Enums;

/**
 * The Status enum.
 *
 * @var static self TEXT
 * @var static self TANGGAL
 * @var static self AREA
 */

enum TypeFieldSurat
{
    const TEXT = 'text';
    const TANGGAL = 'tanggal';
    const AREA = 'area';
    const ANGKA = 'angka';

    public static function getValues(): array
    {
        return [
            self::TEXT,
            self::TANGGAL,
            self::AREA,
            self::ANGKA
        ];
    }
}
