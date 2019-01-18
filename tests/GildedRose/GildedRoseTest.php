<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose;

use Clouding\Kata\GildedRose\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function provider()
    {
        return [
            [['name' => 'normal', 'quality' => 10, 'sellIn' => 5], ['quality' => 9, 'sellIn' => 4]],
            [['name' => 'normal', 'quality' => 10, 'sellIn' => 0], ['quality' => 8, 'sellIn' => -1]],
            [['name' => 'normal', 'quality' => 10, 'sellIn' => -5], ['quality' => 8, 'sellIn' => -6]],
            [['name' => 'normal', 'quality' => 0, 'sellIn' => 5], ['quality' => 0, 'sellIn' => 4]],

            [['name' => 'Aged Brie', 'quality' => 10, 'sellIn' => 5], ['quality' => 11, 'sellIn' => 4]],
            [['name' => 'Aged Brie', 'quality' => 50, 'sellIn' => 5], ['quality' => 50, 'sellIn' => 4]],
            [['name' => 'Aged Brie', 'quality' => 10, 'sellIn' => 0], ['quality' => 12, 'sellIn' => -1]],
            [['name' => 'Aged Brie', 'quality' => 50, 'sellIn' => 0], ['quality' => 50, 'sellIn' => -1]],
            [['name' => 'Aged Brie', 'quality' => 49, 'sellIn' => 0], ['quality' => 50, 'sellIn' => -1]],
            [['name' => 'Aged Brie', 'quality' => 10, 'sellIn' => -10], ['quality' => 12, 'sellIn' => -11]],
            [['name' => 'Aged Brie', 'quality' => 50, 'sellIn' => -10], ['quality' => 50, 'sellIn' => -11]],

            [['name' => 'Sulfuras, Hand of Ragnaros', 'quality' => 10, 'sellIn' => 5], ['quality' => 10, 'sellIn' => 5]],
            [['name' => 'Sulfuras, Hand of Ragnaros', 'quality' => 10, 'sellIn' => -1], ['quality' => 10, 'sellIn' => -1]],

            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 10, 'sellIn' => 11], ['quality' => 11, 'sellIn' => 10]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 10, 'sellIn' => 10], ['quality' => 12, 'sellIn' => 9]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 50, 'sellIn' => 10], ['quality' => 50, 'sellIn' => 9]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 10, 'sellIn' => 5], ['quality' => 13, 'sellIn' => 4]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 50, 'sellIn' => 5], ['quality' => 50, 'sellIn' => 4]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 10, 'sellIn' => 1], ['quality' => 13, 'sellIn' => 0]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 50, 'sellIn' => 1], ['quality' => 50, 'sellIn' => 0]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 10, 'sellIn' => 0], ['quality' => 0, 'sellIn' => -1]],
            [['name' => 'Backstage passes to a TAFKAL80ETC convert', 'quality' => 10, 'sellIn' => -1], ['quality' => 0, 'sellIn' => -2]],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param array $goods
     * @param array $expected
     */
    public function testTick(array $goods, array $expected)
    {
        $item = GildedRose::of($goods['name'], $goods['quality'], $goods['sellIn']);
        $item->tick();

        $this->assertSame($expected['quality'], $item->quality);
        $this->assertSame($expected['sellIn'], $item->sellIn);
    }
}
