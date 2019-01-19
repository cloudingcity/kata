<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose\Item;

class BackstagePass extends Item
{
    /**
     * Tick one day of sell.
     */
    public function tick()
    {
        $this->sellIn -= 1;

        if ($this->sellIn < 0) {
            $this->quality = 0;

            return;
        }

        $this->quality += 1;

        if ($this->sellIn < 10) {
            $this->quality += 1;
        }

        if ($this->sellIn < 5) {
            $this->quality += 1;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
