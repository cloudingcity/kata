<?php

namespace Clouding\kata\Bowling;

class Bowling
{
    protected $rolls = [];
    protected $rollIndex = 0;

    public function roll($pins)
    {
        $this->rolls[$this->rollIndex] = $pins;
        $this->rollIndex++;
    }

    public function score(): int
    {
        $score = 0;
        $i = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            $score += $this->rolls[$i] + $this->rolls[$i + 1];
            $i += 2;
        }

        return $score;
    }
}
