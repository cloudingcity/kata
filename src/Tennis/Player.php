<?php

declare(strict_types=1);

namespace Clouding\Kata\Tennis;

class Player
{
    /**
     * Player name.
     *
     * @var string
     */
    public $name;

    /**
     * Player point.
     *
     * @var int
     */
    public $points;

    /**
     * Create a new instance.
     *
     * @param string $name
     * @param int    $points
     */
    public function __construct(string $name, int $points)
    {
        $this->name = $name;
        $this->points = $points;
    }
}
