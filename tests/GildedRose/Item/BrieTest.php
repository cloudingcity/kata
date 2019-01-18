<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose\Item;

use Clouding\Kata\GildedRose\Item\Brie;
use PHPUnit\Framework\TestCase;

class BrieTest extends TestCase
{
    public function provider()
    {
        return [
            [['quality' => 10, 'sellIn' => 5], ['quality' => 11, 'sellIn' => 4]],
            [['quality' => 50, 'sellIn' => 5], ['quality' => 50, 'sellIn' => 4]],
            [['quality' => 10, 'sellIn' => 0], ['quality' => 12, 'sellIn' => -1]],
            [['quality' => 50, 'sellIn' => 0], ['quality' => 50, 'sellIn' => -1]],
            [['quality' => 49, 'sellIn' => 0], ['quality' => 50, 'sellIn' => -1]],
            [['quality' => 10, 'sellIn' => -10], ['quality' => 12, 'sellIn' => -11]],
            [['quality' => 50, 'sellIn' => -10], ['quality' => 50, 'sellIn' => -11]],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param array $original
     * @param array $expected
     */
    public function testTick(array $original, array $expected)
    {
        $item = new Brie($original['quality'], $original['sellIn']);
        $item->tick();

        $this->assertSame($expected['quality'], $item->quality);
        $this->assertSame($expected['sellIn'], $item->sellIn);
    }
}
