<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose\Item;

class Conjured extends Item
{
    /**
     * Tick one day of sell.
     */
    public function tick()
    {
        $this->quality -= ($this->sellIn <= 0) ? 4 : 2;

        if ($this->quality <= 0) {
            $this->quality = 0;
        }

        $this->sellIn--;
    }
}
