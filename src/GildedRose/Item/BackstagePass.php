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
        if ($this->sellIn > 10) {
            $this->quality += 1;
        } elseif ($this->sellIn <= 10 && $this->sellIn > 5) {
            $this->quality += 2;
        } elseif ($this->sellIn <= 5 && $this->sellIn > 0) {
            $this->quality += 3;
        } else {
            $this->quality = 0;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }

        $this->sellIn--;
    }
}
