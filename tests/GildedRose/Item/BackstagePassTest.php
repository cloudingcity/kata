<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose\Item;

use Clouding\Kata\GildedRose\Item\BackstagePass;
use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{
    public function provider()
    {
        return [
            [['quality' => 10, 'sellIn' => 11], ['quality' => 11, 'sellIn' => 10]],
            [['quality' => 10, 'sellIn' => 10], ['quality' => 12, 'sellIn' => 9]],
            [['quality' => 50, 'sellIn' => 10], ['quality' => 50, 'sellIn' => 9]],
            [['quality' => 10, 'sellIn' => 5], ['quality' => 13, 'sellIn' => 4]],
            [['quality' => 50, 'sellIn' => 5], ['quality' => 50, 'sellIn' => 4]],
            [['quality' => 10, 'sellIn' => 1], ['quality' => 13, 'sellIn' => 0]],
            [['quality' => 50, 'sellIn' => 1], ['quality' => 50, 'sellIn' => 0]],
            [['quality' => 10, 'sellIn' => 0], ['quality' => 0, 'sellIn' => -1]],
            [['quality' => 10, 'sellIn' => -1], ['quality' => 0, 'sellIn' => -2]],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param array $original
     * @param array $expected
     */
    public function testBackstagePassItemTick(array $original, array $expected)
    {
        $item = new BackstagePass($original['quality'], $original['sellIn']);
        $item->tick();

        $this->assertSame($expected['quality'], $item->quality);
        $this->assertSame($expected['sellIn'], $item->sellIn);
    }
}
