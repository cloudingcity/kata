<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\StringCalculator;

use Clouding\Kata\StringCalculator\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /**
     * @var \Clouding\Kata\StringCalculator\StringCalculator
     */
    protected $calculator;

    protected function setUp()
    {
        $this->calculator = new StringCalculator();
    }

    public function provider()
    {
        return [
            [0, ''],
            [5, '5'],
            [3, '1,2'],
            [15, '1,2,3,4,5'],
            [4, '2,2,1000'],
            [6, '2,2\n2'],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testAdd($expected, $string)
    {
        $actual = $this->calculator->add($string);

        $this->assertSame($expected, $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddNegativeNumberStringException()
    {
        $this->calculator->add('3,-2');
    }
}
