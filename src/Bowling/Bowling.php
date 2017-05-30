<?php

namespace Clouding\kata\Bowling;

class Bowling
{
    protected $rolls = [];
    protected $rollIndex = 0;

    public function __construct()
    {
        $this->rolls = array_fill(0, 21, 0);
    }

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
            if ($this->isStrike($rollIndex)) {
                $score += 10 + $this->strikeBonus($rollIndex);
                $rollIndex += 1;
            } elseif ($this->isSpare($rollIndex)) {
                $score += 10 + $this->spareBonus($rollIndex);
                $rollIndex += 2;
            } else {
                $score += $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
                $rollIndex += 2;
            }
        }

        return $score;
    }

    /**
     * @param $rollIndex
     * @return bool
     */
    protected function isStrike($rollIndex): bool
    {
        return $this->rolls[$rollIndex] == 10;
    }

    /**
     * @param $rollIndex
     * @return int
     */
    protected function strikeBonus($rollIndex): int
    {
        return $this->rolls[$rollIndex + 1] + $this->rolls[$rollIndex + 2];
    }

    /**
     * @param $rollIndex
     * @return bool
     */
    protected function isSpare($rollIndex): bool
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] == 10;
    }

    /**
     * @param $rollIndex
     * @return int
     */
    protected function spareBonus($rollIndex): int
    {
        return $this->rolls[$rollIndex + 2];
    }
}
