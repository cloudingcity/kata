<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose\Item;

class Normal extends Item
{
    /**
     * Tick one day of sell.
     */
    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality -= 1;

        if ($this->sellIn <= 0) {
            $this->quality -= 1;
        }

        if ($this->quality <= 0) {
            $this->quality = 0;
        }
    }
}
