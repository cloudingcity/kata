<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose\Item;

class Brie extends Item
{
    /**
     * Tick one day of sell.
     */
    public function tick()
    {
        $this->quality += ($this->sellIn <= 0) ? 2 : 1;

        if ($this->quality > 50) {
            $this->quality = 50;
        }

        $this->sellIn--;
    }
}
