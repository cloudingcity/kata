<?php

declare(strict_types=1);

namespace Clouding\Kata\RomanNumerals;

class RomanNumerals
{
    /**
     * Roman numerals and number mappings.
     *
     * @var array
     */
    protected static $mappings = [
       'M' => 1000,
       'CM' => 900,
       'D' => 500,
       'CD' => 400,
       'C' => 100,
       'XC' => 90,
       'L' => 50,
       'XL' => 40,
       'X' => 10,
       'IX' => 9,
       'V' => 5,
       'IV' => 4,
       'I' => 1,
    ];

    /**
     * Convert number to roman numeral.
     *
     * @param  int $number
     * @return string
     */
    public static function convert(int $number): string
    {
        $roman = '';

        foreach (static::$mappings as $glyph => $limit) {
            while ($number >= $limit) {
                $roman .= $glyph;
                $number -= $limit;
            }
        }

        return $roman;
    }
}

