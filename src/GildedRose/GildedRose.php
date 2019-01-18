<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose;

/**
 * @see https://github.com/laracasts/Gilded-Rose-Kata-in-PHP
 */
class GildedRose
{
    /**
     * The item name.
     *
     * @var string
     */
    public $name;

    /**
     * The item of quality.
     *
     * @var int
     */
    public $quality;

    /**
     * The item will sell the day.
     *
     * @var int
     */
    public $sellIn;

    /**
     * Create a item instance.
     *
     * @param string $name
     * @param int    $quality
     * @param int    $sellIn
     */
    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * Get a item of attributes.
     *
     * @param string $name
     * @param int    $quality
     * @param int    $sellIn
     * @return \Clouding\Kata\GildedRose\GildedRose
     */
    public static function of(string $name, int $quality, int $sellIn): GildedRose
    {
        return new static($name, $quality, $sellIn);
    }

    /**
     * Tick one day of sell.
     */
    public function tick()
    {
        if ($this->name === 'normal') {
            if ($this->sellIn <= 0) {
                $this->quality -= 2;
            } else {
                $this->quality -= 1;
            }

            if ($this->quality <= 0) {
                $this->quality = 0;
            }
        } elseif ($this->name === 'Aged Brie') {
            if ($this->sellIn <= 0) {
                $this->quality += 2;
            } else {
                $this->quality += 1;
            }
        } elseif ($this->name === 'Backstage passes to a TAFKAL80ETC convert') {
            if ($this->sellIn > 10) {
                $this->quality += 1;
            } elseif ($this->sellIn <= 10 && $this->sellIn > 5) {
                $this->quality += 2;
            } elseif ($this->sellIn <= 5 && $this->sellIn > 0) {
                $this->quality += 3;
            } else {
                $this->quality = 0;
            }
        }

        if ($this->name !== 'Sulfuras, Hand of Ragnaros') {
            $this->sellIn--;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
