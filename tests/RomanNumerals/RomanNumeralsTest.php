<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\RomanNumerals;

use Clouding\Kata\RomanNumerals\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    public function provider(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [9, 'IX'],
            [10, 'X'],
            [11, 'XI'],
            [20, 'XX'],
            [50, 'L'],
            [100, 'C'],
            [500, 'D'],
            [1000, 'M'],
            [1999, 'MCMXCIX'],
            [4990, 'MMMMCMXC'],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param int    $number
     * @param string $expected
     */
    public function testCovert(int $number, string $expected)
    {
        $this->assertSame($expected, RomanNumerals::convert($number));
    }
}
