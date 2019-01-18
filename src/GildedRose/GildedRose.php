<?php

declare(strict_types=1);

namespace Clouding\Kata\GildedRose;

use Clouding\Kata\GildedRose\Item\BackstagePass;
use Clouding\Kata\GildedRose\Item\Brie;
use Clouding\Kata\GildedRose\Item\Conjured;
use Clouding\Kata\GildedRose\Item\Normal;
use Clouding\Kata\GildedRose\Item\Sulfura;
use InvalidArgumentException;

/**
 * @see https://github.com/laracasts/Gilded-Rose-Kata-in-PHP
 */
class GildedRose
{
    /**
     * Lookup item.
     *
     * @var array
     */
    const LOOKUP = [
        'normal' => Normal::class,
        'Aged Brie' => Brie::class,
        'Backstage passes to a TAFKAL80ETC convert' => BackstagePass::class,
        'Sulfuras, Hand of Ragnaros' => Sulfura::class,
        'Conjured Mana Cake' => Conjured::class,
    ];

    /**
     * Get a item of attributes.
     *
     * @param string $name
     * @param int    $quality
     * @param int    $sellIn
     * @return \Clouding\Kata\GildedRose\Item\Item
     */
    public static function of(string $name, int $quality, int $sellIn)
    {
        if (!isset(static::LOOKUP[$name])) {
            throw new InvalidArgumentException("$name is not supported.");
        }

        $class = static::LOOKUP[$name];

        return new $class($quality, $sellIn);
    }
}
