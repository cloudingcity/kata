<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\FizzBuzz;

use Clouding\Kata\FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function provider()
    {
        return [
            [1, 1],
            [2, 2],
            [3, 'fizz'],
            [5, 'buzz'],
            [6, 'fizz'],
            [10, 'buzz'],
            [15, 'fizzbuzz'],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param int        $number
     * @param int|string $expected
     */
    public function testExecute(int $number, $expected)
    {
        $this->assertSame($expected, (new FizzBuzz())->execute($number));
    }

    public function testExecuteUpTo()
    {
        $this->assertSame([1, 2, 'fizz', 4, 'buzz'], (new FizzBuzz())->executeUpTo(5));
    }
}
