<?php

declare(strict_types=1);

namespace Clouding\Kata\Codewars\RectangleIntoSquares;

function squareInRectangle(int $length, int $width)
{
    if ($length === $width) {
        return null;
    }

    $output = [];

    while ($width > 0) {
        if ($length > $width) {
            $output[] = $width;
            $length -= $width;
        } else {
            $output[] = $length;
            $width -= $length;
        }
    }

    return $output;
}
