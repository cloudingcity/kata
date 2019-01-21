<?php

declare(strict_types=1);

namespace Clouding\Kata\Codewars\RectangleIntoSquares;

function squareInRectangle(int $length, int $width)
{
    if ($length === $width) {
        return null;
    }

    $output = [];
    $area = $length * $width;

    while ($area > 0) {
        $minSide = min($length, $width);
        $maxSide = max($length, $width);
        $maxSquare = pow($minSide, 2);
        $area = $area - $maxSquare;
        $output[] = $minSide;

        $length = $maxSide - $minSide;
        $width = $minSide;
    }

    return $output;
}
