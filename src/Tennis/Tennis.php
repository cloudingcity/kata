<?php

declare(strict_types=1);

namespace Clouding\Kata\Tennis;

class Tennis
{
    /**
     * The score mapping.
     *
     * @var array
     */
    const SCORE_MAPPING = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    /**
     * Player 1.
     *
     * @var \Clouding\Kata\Tennis\Player
     */
    protected $player1;

    /**
     * Player 2.
     *
     * @var \Clouding\Kata\Tennis\Player
     */
    protected $player2;

    /**
     * Create a new instance.
     *
     * @param \Clouding\Kata\Tennis\Player $player1
     * @param \Clouding\Kata\Tennis\Player $player2
     */
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    /**
     * Get score.
     *
     * @return string
     */
    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Win for ' . $this->winner()->name;
        }

        if ($this->hasAdvantage()) {
            return 'Advantage ' . $this->winner()->name;
        }

        if ($this->inDeuce()) {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    /**
     * Determine if has a winner or not.
     *
     * @return bool
     */
    protected function hasWinner(): bool
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingBy(2);
    }

    /**
     * Has enough points to be won.
     *
     * @return bool
     */
    protected function hasEnoughPointsToBeWon(): bool
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    /**
     * Is leading by the points.
     *
     * @param  int $points
     * @return bool
     */
    protected function isLeadingBy($points): bool
    {
        return abs($this->player1->points - $this->player2->points) >= $points;
    }

    /**
     * Get winner.
     *
     * @return \Clouding\Kata\Tennis\Player
     */
    protected function winner(): Player
    {
        return $this->player1->points > $this->player2->points ?
            $this->player1 : $this->player2;
    }

    /**
     * Determine if has advantage or not.
     *
     * @return bool
     */
    protected function hasAdvantage(): bool
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingBy(1);
    }

    /**
     * Determine if two players in deuce or not.
     *
     * @return bool
     */
    public function inDeuce()
    {
        return $this->tied() && ($this->player1->points + $this->player2->points) >= 6;
    }

    /**
     * Determine if two players tied or not.
     *
     * @return bool
     */
    protected function tied(): bool
    {
        return $this->player1->points === $this->player2->points;
    }

    /**
     * Get general score.
     *
     * @return string
     */
    protected function generalScore(): string
    {
        if ($this->tied()) {
            return static::SCORE_MAPPING[$this->player1->points] . '-All';
        }

        return static::SCORE_MAPPING[$this->player1->points] . '-' . static::SCORE_MAPPING[$this->player2->points];
    }
}
