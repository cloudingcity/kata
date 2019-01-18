<?php

declare(strict_types=1);

namespace Clouding\Kata\Tests\GildedRose\Item;

use Clouding\Kata\GildedRose\Item\Sulfura;
use PHPUnit\Framework\TestCase;

class SulfuraTest extends TestCase
{
    public function provider()
    {
        return [
            [['quality' => 10, 'sellIn' => 5], ['quality' => 10, 'sellIn' => 5]],
            [['quality' => 10, 'sellIn' => -1], ['quality' => 10, 'sellIn' => -1]],
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
        $item = new Sulfura($original['quality'], $original['sellIn']);
        $item->tick();

        $this->assertSame($expected['quality'], $item->quality);
        $this->assertSame($expected['sellIn'], $item->sellIn);
    }
}
