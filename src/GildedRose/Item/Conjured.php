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
        $this->sellIn -= 1;
        $this->quality -= 2;

        if ($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        if ($this->quality <= 0) {
            $this->quality = 0;
        }
    }
}
