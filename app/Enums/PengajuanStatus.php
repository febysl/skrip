<?php

namespace App\Enums;

/**
 * The Status enum.
 *
 * @var static self TERTUNDA
 * @var static self DIPROSES
 * @var static self SELESAI
 */
enum PengajuanStatus: string
{
    case TERTUNDA = 'tertunda';
    case DIPROSES = 'diproses';
    case SELESAI = 'selesai';

    public static function getValues(): array
    {
        return [
            self::TERTUNDA->value,
            self::DIPROSES->value,
            self::SELESAI->value,
        ];
    }
}