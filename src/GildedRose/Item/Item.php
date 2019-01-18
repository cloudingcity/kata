<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose\Item;

abstract class Item
{
    /**
     * The quality of item.
     *
     * @var int
     */
    public $quality;

    /**
     * The day item will sell in.
     *
     * @var int
     */
    public $sellIn;

    /**
     * Create a item instance.
     *
     * @param int $quality
     * @param int $sellIn
     */
    public function __construct(int $quality, int $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * Tick one day of sell.
     */
    abstract public function tick();
}
