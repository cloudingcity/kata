<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose\Item;

use Clouding\Kata\GildedRose\Item\Conjured;
use PHPUnit\Framework\TestCase;

class ConjuredTest extends TestCase
{
    public function provider()
    {
        return [
            [['quality' => 10, 'sellIn' => 10], ['quality' => 8, 'sellIn' => 9]],
            [['quality' => 0, 'sellIn' => 10], ['quality' => 0, 'sellIn' => 9]],
            [['quality' => 10, 'sellIn' => 0], ['quality' => 6, 'sellIn' => -1]],
            [['quality' => 0, 'sellIn' => 0], ['quality' => 0, 'sellIn' => -1]],
            [['quality' => 10, 'sellIn' => -10], ['quality' => 6, 'sellIn' => -11]],
            [['quality' => 0, 'sellIn' => -10], ['quality' => 0, 'sellIn' => -11]],
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
        $item = new Conjured($original['quality'], $original['sellIn']);
        $item->tick();

        $this->assertSame($expected['quality'], $item->quality);
        $this->assertSame($expected['sellIn'], $item->sellIn);
    }
}
