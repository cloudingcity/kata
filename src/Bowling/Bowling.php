<?php

namespace Clouding\kata\Bowling;

class Bowling
{
    protected $score = 0;

    public function roll($pins)
    {
        $this->score += $pins;
    }

    public function score(): int
    {
        return $this->score;
    }
}
