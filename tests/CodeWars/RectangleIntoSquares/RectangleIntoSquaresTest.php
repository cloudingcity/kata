<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\CodeWars\RectangleIntoSquares;

use function Clouding\Kata\Codewars\RectangleIntoSquares\squareInRectangle;
use PHPUnit\Framework\TestCase;

class RectangleIntoSquaresTest extends TestCase
{
    public function provider()
    {
        return [
            [[1, 1], null],
            [[2, 1], [1, 1]],
            [[3, 2], [2, 1, 1]],
            [[2, 3], [2, 1, 1]],
            [[5, 3], [3, 2, 1, 1]],
            [[3, 5], [3, 2, 1, 1]],
            [[20, 14], [14, 6, 6, 2, 2, 2]],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param array      $input
     * @param array|null $expected
     */
    public function test(array $input, ?array $expected)
    {
        $this->assertSame($expected, squareInRectangle(...$input));
    }
}
