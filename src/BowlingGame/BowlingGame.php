<?php

declare(strict_types=1);

namespace Clouding\Kata\BowlingGame;

class BowlingGame
{
    /**
     * Rolls of game.
     *
     * @var array
     */
    protected $rolls = [];

    /**
     * Roll pin.
     *
     * @param int $pins
     *
     * @throws \InvalidArgumentException
     */
    public function roll(int $pins)
    {
        $this->guardInvalidRolls($pins);

        $this->rolls[] = $pins;
    }

    /**
     * Guard invalid rolls.
     *
     * @param int $pins
     *
     * @throws \InvalidArgumentException
     */
    protected function guardInvalidRolls(int $pins): void
    {
        if ($pins < 0 || $pins > 10) {
            throw new \InvalidArgumentException("Invalid pins number of $pins");
        }
    }

    /**
     * Get game score.
     *
     * @return int
     */
    public function score(): int
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++) {
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            } elseif ($this->isSpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->getDefaultFrameScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * Get default frame score.
     *
     * @param  int $roll
     * @return int
     */
    protected function getDefaultFrameScore(int $roll): int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * Check is spare.
     *
     * @param  int  $roll
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] === 10;
    }

    /**
     * Get spare bonus score.
     *
     * @param  int $roll
     * @return int
     */
    protected function spareBonus(int $roll): int
    {
        return $this->rolls[$roll + 2];
    }

    /**
     * @param int $roll
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] === 10;
    }

    /**
     * Get strike bonus score.
     *
     * @param  int $roll
     * @return int
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }
}
