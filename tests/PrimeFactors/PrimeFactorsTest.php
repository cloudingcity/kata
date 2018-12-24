<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\PrimeFactors;

use Clouding\Kata\PrimeFactors\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    public function provider()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [9, [3, 3]],
            [100, [2, 2, 5, 5]],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param int $number
     * @param array $expected
     */
    public function testPrimeFactors(int $number, array $expected)
    {
        $this->assertSame(PrimeFactors::generate($number), $expected);
    }
}
