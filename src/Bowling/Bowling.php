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
        $rollIndex = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isSpare($rollIndex)) {
                $score += 10 + $this->rolls[$rollIndex + 2];
            } else {
                $score += $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
            }
            $rollIndex += 2;
        }

        return $score;
    }

    /**
     * @param $rollIndex
     * @return bool
     */
    protected function isSpare($rollIndex): bool
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] == 10;
    }
}
